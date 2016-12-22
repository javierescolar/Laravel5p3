<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use Auth;
use Redirect;

class HomeController extends Controller
{
    public function index(){
        $carruselProducts = Product::where('carrusel',1)->get();
        $offerProducts = Product::where('offer',1)->get();
        if(!Auth::guest()){
            if(Auth::user()->role == "admin"){
                return redirect()->action('AdminController@index');
            } else {
                return view('home',compact('carruselProducts','offerProducts'));
            }
        }
        return view('home',compact('carruselProducts','offerProducts'));
    }
    
    public function search(Request $request){
        $product = $request->keyword;
        $results = Product::where('name', 'like', "%$product%")
            ->orWhere('description', 'like', "%$product%")->get();
        return $results;
    }
}
