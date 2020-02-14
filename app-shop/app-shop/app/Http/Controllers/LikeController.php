<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\like;
class LikeController extends Controller
{
    public function create($id)
    {
        $user=Auth::user()->id;
        $valor=like::where('product_id',$id)->where('user_id',$user);
        
        if ($valor->count()==0)
        {
            $like= new like();
            $like->user_id=$user;
            $like->product_id=$id;
            $like->choice=true;
            $like->save();
            
        }
        else
        {
            $vlike=like::find($valor->first()->id);
            if ($vlike->choice==true) 
            {
                $vlike->choice=false;
            }
            else
            {
                $vlike->choice=true;
            }
            $vlike->save();
        }
        return back();

        
    }
}
