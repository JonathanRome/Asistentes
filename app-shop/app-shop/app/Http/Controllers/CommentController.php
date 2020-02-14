<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
   
        public function create(Request $request)
        {
            $this->validar($request);
            $user_id = Auth::user()->id;
            $comment=new Comment();
            $comment->user_id=$user_id;
            $comment->product_id = $request->input('product_id');
            $comment->body=$request->input('body');
            $comment->save();
            return back();
        }

        public function destroy($id)
        {
            $comment=Comment::find($id);
            $comment->delete();
            return back();
        }

        public function validar($request)
        {
    	    $messages=[ 'body.required'=>'Es necesario ingresar un texto'];
            $rules=['body'=>'required'];
    	    $this->validate($request,$rules,$messages);
        }
    
}
