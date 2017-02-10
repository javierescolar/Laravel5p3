<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Http\Requests;
use Auth;
use Redirect;
use App\Cart;

class HomeController extends Controller {

    public function index() {
        $carruselProducts = Image::where('carrusel', 1)->orderByRaw('RAND()')->take(3)->get();
        ;
        $offerProducts = Image::where('offer', 1)->get();

        if (!Auth::guest()) {
            if (Auth::user()->role == "admin") {
                return redirect()->action('AdminController@index');
            } else {
                return view('home', compact('carruselProducts', 'offerProducts'));
            }
        }
        return view('home', compact('carruselProducts', 'offerProducts'));
    }

    public function search(Request $request) {
        $search = $request->keyword;
        $products = Product::where('name', 'like', "%$search%")->get();
        foreach ($products as $key => $product) {
            $results[$key]['brand'] = $product->brand;
            $results[$key]['product'] = $product;
            $results[$key]['images'] = $product->images;
        }
        return $results;
    }
    
    public function searchAdvance(Request $request) {
        $brandSelected = $request->brandSelected;
        $priceMin = $request->priceMin;
        $priceMax = $request->priceMax;
        $discount = $request->discount;
        if($discount){
            $products = Product::where('brand_id', '=', $brandSelected)
                        ->where('discount', '>',0)
                        ->whereBetween('price',[$priceMin,$priceMax])
                        ->get();
        } else {
            $products = Product::where('brand_id', '=', $brandSelected)
                        ->where('discount', '=',0)
                        ->whereBetween('price',[$priceMin,$priceMax])
                        ->get();
        }
            
        foreach ($products as $key => $product) {
            $results[$key]['brand'] = $product->brand;
            $results[$key]['product'] = $product;
            $results[$key]['images'] = $product->images;
        }
        return $results;
    }

}
