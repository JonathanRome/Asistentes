<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
class CartDetailController extends Controller
{
    public function store(Request $request)
    {
		$cartDetail_all=auth()->user()->cart->details;
		$var=false;
		foreach ($cartDetail_all as  $detail)
		{
			if ($request->product_id==$detail->product_id)
			{
				$detail->quantity=$request->quantity;
				$detail->save();
				$notification='La cantidad del libro se a actualizado.';	
				$var=true;
			}
			
		}
		if (!$var)
		{
			$cartDetail= new CartDetail();
			$cartDetail->cart_id=auth()->user()->cart->id;
			$cartDetail->product_id=$request->product_id;
			$cartDetail->quantity=$request->quantity;
			$cartDetail->price_detail=$request->price;
			$cartDetail->save();
			$notification='El libro se ha agregado al carrito de compras! ';
		}
    	
        return back()->with(compact('notification'));

    }

    


     public function  destroy(Request $request)
    {
    	$cartDetail= CartDetail::find($request->cart_detail_id);
    	if ($cartDetail->cart_id==auth()->user()->cart->id) {
    		$cartDetail->delete();
    	}
    	$notification='El libro se ha eliminado del carrito. ';
    	return back()->with(compact('notification'));

    }
}
