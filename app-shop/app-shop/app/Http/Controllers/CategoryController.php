<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\like;
class CategoryController extends Controller
{
  public function show(Category $category)
  {
  	$categories=Category::has('products')->get();
    $products=$category->products()->orderBy('id','desc')->paginate(50);
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

           return view('categories.show')->with(compact('category','products','categories','likes','collect_likes'));
       }
  	return view('categories.show')->with(compact('category','products','categories'));
  }
	public static function index()
  {
    $category=Category::orderBy('id','desc')->get();
    return $category;
  }
}
