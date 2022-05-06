<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
   public function cart(Request $request){
    //    dd(session('cartItems'));
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
               "brand"=>$product->brand,
               "details"=>$product->details,
               "price"=>$product->price,
               "quantity"=>1

           ];
       }

       session()->put('cartItems', $cartItems);
       return redirect()->back()->with('succes', 'Product added to cart!');
   }

   public function delete(Request $request){
       if($request->id){
           $cartItems = session()->get('cartItems');

           if(isset($cartItems[$request->id])){
               unset($cartItems[$request->id]);
               session()->put('cartItems', $cartItems);
           }
           return redirect()->back()->with('succes', 'Product deleted succesfully!');

       }
   }

   public function update(Request $request)
   {
       if($request->id && $request->quantity){
           $cartItems = session()->get('cartItems');
           $cartItems[$request->id]["quantity"] = $request->quantity;
           session()->put('cartItems', $cartItems);
       }

       return redirect()->back()->with('success', 'Quantity added to cart!');
   }
}