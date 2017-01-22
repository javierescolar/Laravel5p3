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

    

    public function index(Brand $brand, Product $product) {
        $images = $product->images()->get();
        return view('images.index', compact('product', 'images'));
    }
}
