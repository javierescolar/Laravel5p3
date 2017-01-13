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
use File;
use Storage;

class AdminController extends Controller {

    public function index() {
        $brands = Brand::all();
        $products = Product::all();
        $users = User::all();
        if (Auth::user()->role == "admin") {
            $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
            return view('homeAdmin', compact('brands', 'products', 'users', 'access'));
        }
        return redirect()->action('HomeController@index');
    }

    public function getUsers() {
        $users = User::all();
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.users.index', compact('users', 'access'));
    }

    public function deleteUser($id) {
        $user = User::where('id', '=', $id)->delete();
        return redirect('/adminusers')->with('message', 'User remove successfully');
    }

    public function actdesUser($id, $active) {
        $active = ($active == 0) ? 1 : 0;
        $user = User::where('id', '=', $id)->update(["active" => $active]);
        return redirect('/adminusers')->with('message', 'User modified successfully');
    }

    public function getFormUploadXML() {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.partials.formUploadXML', compact('access'));
    }

    public function uploadXML(Request $request) {
        $file = $request->file('xmlFile');
        //obtenemos el nombre del archivo
        $nombre = date("Y_m_d_His") . "_uplaodFileXML.xml";
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('xml')->put($nombre, \File::get($file));
        $ruta = public_path()."/xml/".$nombre;
        $xml = simplexml_load_file($ruta);
        insertDataXML($xml);
        //Una vez subido el fichero lo cargamos y lo ejecutamos
    }
    
    public function insertDataXML($xml){
        foreach($xml->brands as $brand){
            $xmlBrand['name'] = $brand->name;
            $xmlBrand['slug'] = $brand->slug;
            $xmlBrand['logo'] = $brand->logo;
            $brand = Brand::create($xmlBrand)->save();
            $lastInsertIdBrand = $brand->id;
            foreach ($brand->products as $product)
            
        }
    }

}
