<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Product;
class ProductController extends Controller
{
  public function show($id)
  {

    $product=Product::find($id);
    $images=$product->images;

    $imagesLeft=collect();
    $imagesRight=collect();
    foreach ($images as $key => $image) {
      if ($image->featured==true ) {
         $imagesLeft->push($image);
         
      }
      else{

        $imagesRight->push($image);
      }
    }
    $comments=Comment::where('product_id',$id)->latest('created_at')->get();
    return view('products.show')->with(compact('product','imagesLeft','imagesRight','comments'));
  }

 
}
