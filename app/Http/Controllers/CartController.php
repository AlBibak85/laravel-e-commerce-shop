<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart(Request $request) {
        
        $product = Product::find($request->id);

        Cart::add(array(
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->qty,
            'image'=>$product->product_image
          
        ));
        return redirect('/show/cart');

//        Cart::add([
//            'id' => $request->id,
//            'name' => $product->product_name,
//            'price' => $product->product_price,
//            'quantity' => $request->qty,
//            'image'=>$product->product_image,
//        ]);
//        return redirect('/show/cart');
    }

    public function showCart() {
        $cartProducts = Cart::getContent();
        return view('frontEnd.cart.show-cart',['cartProducts'=>$cartProducts]);
    }
    
    public function deleteCart($id)
    {
        Cart::remove($id);
        return redirect('/show/cart');
        
    }
    public function updateCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
        return redirect('/show/cart');
    }

    
}
