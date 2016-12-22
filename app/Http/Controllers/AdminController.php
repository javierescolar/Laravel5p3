<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use App\Product;
use App\User;
use Auth;
use Redirect;
class AdminController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $users = User::all();
        if(Auth::user()->role == "admin"){
            return view('homeAdmin',compact('brands','products','users'));
        }
        return redirect()->action('HomeController@index');
    }
}
