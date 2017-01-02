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
    public function store(Request $request) {
        $inputs = $request->all();
        $imagepath = "products/";
        foreach ($inputs['image'] as $key => $image) {
            $objImg['product_id'] = 1;
            $objImg['location'] = $imagepath . $image->getClientOriginalName();
            $objImg['slug'] = "image-" . ($key + 1);
            $objImg['offer'] = isset($inputs['offer'][$key]) ? 1 : 0;
            $objImg['carrusel'] = isset($inputs['carrusel'][$key]) ? 1 : 0;
            $objImg['gallery'] = isset($inputs['gallery'][$key]) ? 1 : 0;
            Image::create($objImg);
            Storage::disk('products')->put($image->getClientOriginalName(), \File::get($image));
        }
        //obtenemos el campo file definido en el formulario
        /*$file = $request->file('image');
        $input['image'] = $imagepath . $file->getClientOriginalName();
        $input['image_carrusel'] = $imagepathCarrusel . $fileCarrusel->getClientOriginalName();
        $input['offer'] = (isset($input['offer'])) ? 1 : 0;
        $input['carrusel'] = (isset($input['carrusel'])) ? 1 : 0;
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('products')->put($file->getClientOriginalName(), \File::get($file));*/
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
