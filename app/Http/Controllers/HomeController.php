<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Http\Requests;
use Auth;
use Redirect;


class HomeController extends Controller {

    public function index() {
        $carruselProducts = Image::where('carrusel', 1)->get();
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
        $results = Product::where('name', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")->get();
        return $results;
    }
    
    

}
