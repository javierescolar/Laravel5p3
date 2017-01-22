<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Brand;
use App\Product;
use App\Image;
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
            $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
            return view('homeAdmin', compact('brands', 'products', 'users', 'access'));
        }
        return redirect()->action('HomeController@index');
    }

    public function getUsers() {
        $users = User::all();
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
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
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
        return view('admin.partials.formUploadXML', compact('access'));
    }

    public function uploadXML(Request $request) {
        $file = $request->file('xmlFile');
        //obtenemos el nombre del archivo
        $nombre = date("Y_m_d_His") . "_uplaodFileXML.xml";
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('xml')->put($nombre, \File::get($file));
        $ruta = public_path() . "/xml/" . $nombre;
        $xml = simplexml_load_file($ruta);
        foreach ($xml->brand as $brand) {
            $xmlBrand['name'] = $brand->name;
            $xmlBrand['slug'] = $brand->slug;
            $xmlBrand['logo'] = $brand->logo;
            $newBrand = Brand::create($xmlBrand);
            $newBrand->save();
            foreach ($brand->product as $product) {
                $xmlProduct['name'] = $product->name;
                $xmlProduct['slug'] = $product->slug;
                $xmlProduct['brand_id'] = $newBrand->id;
                $xmlProduct['slogan'] = $product->slogan;
                $xmlProduct['description'] = $product->description;
                $xmlProduct['characteristic_1'] = $product->characteristic_1;
                $xmlProduct['characteristic_2'] = $product->characteristic_2;
                $xmlProduct['characteristic_3'] = $product->characteristic_3;
                $xmlProduct['price'] = $product->price;
                $xmlProduct['discount'] = $product->discount;
                $xmlProduct['stock'] = $product->stock;
                $newProduct = Product::create($xmlProduct);
                $newProduct->save();
                foreach($product->image as $image){
                    $xmlImage['location'] = $image->location;
                    $xmlImage['product_id'] = $newProduct->id;
                    $xmlImage['offer'] = $image->offer;
                    $xmlImage['carrusel'] = $image->carrusel;
                    $xmlImage['gallery'] = $image->gallery;
                    $newImage = Image::create($xmlImage);
                    $newImage->save(); 
                }
            }
        }
        return redirect()->route("amdinUploadXML")->with("message","load file successully");
    }

}
