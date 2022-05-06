<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
   public function cart(){
       dd(session('cartItems'));
       return view('cart.index');
   }

   public function addToCart($id){
       $product = Product::findOrFail($id);
       $cartItems = session()->get('cartItems',[]);

       if(isset($cartItems[$id])){
           $cartItems[$id]['quantity']++;
       }else{
           $cartItems[$id]=[
               "image_path"=>$product->image_path,
               "name"=>$product->name,
               "details"=>$product->details,
               "price"=>$product->price,
               "quantity"=>1

           ];
       }

       session()->put('cartItems', $cartItems);
       return redirect()->back()->with('succes', 'Product added to cart!');
   }
}
