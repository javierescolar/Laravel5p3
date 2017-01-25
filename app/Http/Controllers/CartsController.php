<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;

class CartsController extends Controller {

    public function show() {
        $cart = Cart::content();
        return view('cart.show', compact('cart'));
    }

    public function addProductCart($id) {
        $product = Product::where('id', '=', $id)->get();
        Cart::add((String) $id, $product[0]->name, 1, $product[0]->price)->associate('App\Product');
        return redirect()->route('brands.products.show', [$product[0]->brand->slug, $product[0]->slug])->with("message", "Product added to cart");
    }

    public function emptyCart() {
        Cart::destroy();
        $cart = Cart::content();
        return view('cart.show', compact('cart'));
    }
/*
    public function removeProductCart(Request $request) {

        $idProduct = $request->id_product;
        foreach(Cart::content() as $cart){
            if($cart->model->id == $idProduct){
                $cart->delete;
            }
        }
       
        $cart = Cart::content();
        return view('cart.show', compact('cart'))->with("message", "product remove of the cart");
    }
*/
}
