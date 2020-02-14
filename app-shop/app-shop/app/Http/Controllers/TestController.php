<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\like;
class TestController extends Controller
{
    public function welcome()
    {
    	$categories=Category::has('products')->get();
        $products= Product::orderBy('id','desc')->paginate(20);
        //like de un usuario loguiado
        $likes=like::where('choice',true)->get();
        if (Auth::user())
        {
            $user=Auth::user()->id;
            $collect_likes=collect();
            foreach ($likes as $like)
            {
                if ($like->user_id==$user)
                {
                    $collect_likes->push($like->product_id);
                }
            }

            return view('welcome')->with(compact('products','categories','likes','collect_likes'));
        }
        


        return view('welcome')->with(compact('products','categories'));
    }
}
