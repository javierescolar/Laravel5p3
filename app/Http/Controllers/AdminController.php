<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use App\Product;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
class AdminController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $users = User::all();
        if(Auth::user()->role == "admin"){
            $access = \App\AdminAccess::where('user_id','=',Auth::id())->orderBy('id', 'desc')->take(10)->get(); 
            return view('homeAdmin',compact('brands','products','users','access'));
        }
        return redirect()->action('HomeController@index');
    }
}
