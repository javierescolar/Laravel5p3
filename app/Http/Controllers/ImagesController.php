<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;

class ImagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand, Product $product) {
        $images = $product->images()->get();
        return view('images.index', compact('product', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand, Product $product) {
        return view('images.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Brand $brand, Product $product, Request $request) {
        $inputs = Input::all();
        $imagepath = "products/";
        $lastImg = Image::all()->where('product_id', '=', $product->id)->last();
        (int)$count = str_replace('-','',substr($lastImg->slug,-2));
        foreach ($inputs['image'] as $key => $image) {
            $count++;
            $objImg = new Image();
            $objImg->product_id = $product->id;
            $objImg->location = $imagepath . $image->getClientOriginalName();
            $objImg->slug = "image-" . $count;
            $objImg->offer = isset($inputs['offer'][$key]) ? 1 : 0;
            $objImg->carrusel = isset($inputs['carrusel'][$key]) ? 1 : 0;
            $objImg->gallery = isset($inputs['gallery'][$key]) ? 1 : 0;
            $objImg->save();
            Storage::disk('products')->put($image->getClientOriginalName(), \File::get($image));
        }
        $images = $product->images()->get();
        return view('images.index', compact('product', 'images'))->with('message', 'Image deleted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand, Product $product) {
//        $images = $product->images()->get();
//        return view('images.show', compact('product','images')); 
    }

    

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand, Product $product, Image $image) {
        $image->delete();
        $images = $product->images()->get();
        return view('images.index', compact('product', 'images'))->with('message', 'Image deleted.');
    }

}
