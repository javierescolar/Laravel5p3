<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;

class ProductsController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
        'slogan' => ['required'],
        'description' => ['required'],
        'characteristic_1' => ['required'],
        'characteristic_2' => ['required'],
        'characteristic_3' => ['required'],
        'price' => ['required'],
        'stock' => ['required'],
        
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand $brand
     * @param  \App\Product   $product
     * @return Response
     */
    public function show(Brand $brand, Product $product) {
        $imagesCarruselGallery = $product->images()->where("gallery",1)->get();  
        return view('products.show', compact('brand', 'product','imagesCarruselGallery'));
    }

}
