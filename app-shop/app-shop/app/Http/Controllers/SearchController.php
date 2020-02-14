<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\like;
class SearchController extends Controller
{
    public function show(Request $request)
    {	
    	$query=$request->input('query');
    	//dd($query);->mostrar el valor en pantalla
    	$products=Product::where('name','like',"%$query%")->orderBy('id','desc')->orderBy('id','desc')->paginate(50);
    	$categories=Category::has('products')->get();//has me manda las caracteristicas que tienen productos

    	if ($products->count()==1) {
    		$id=$products->first()->id;
    		return redirect("products/$id");//esto es igual a 'products/'.$id
		}
		
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
 
			 return view('search.show')->with(compact('products','query','categories','likes','collect_likes'));
		 }


    	return view('search.show')->with(compact('products','query','categories'));
    }
    public function data()
    {

    	$products=Product::pluck('name');
    	return $products;
    }
}
