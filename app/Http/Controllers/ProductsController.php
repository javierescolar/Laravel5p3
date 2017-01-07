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

    public function index(Brand $brand) {
        return view('products.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Brand $brand
     * @return Response
     */
    public function create(Brand $brand) {
        return view('products.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Brand $brand
     * @return Response
     */
    public function store(Brand $brand, Request $request) {
        $this->validate($request, $this->rules);
        $input = Input::all();
        $input['brand_id'] = $brand->id;   
        Product::create($input);
        return Redirect::route('brands.show', $brand->slug)->with('message', 'Product created.');
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand $brand
     * @param  \App\product    $product
     * @return Response
     */
    public function edit(Brand $brand, Product $product) {
        return view('products.edit', compact('brand', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Brand $brand
     * @param  \App\product    $product
     * @return Response
     */
    public function update(Brand $brand, Product $product, Request $request) {
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), '_method');
        $product->update($input);

        return Redirect::route('brands.products.show', [$brand->slug, $product->slug])->with('message', 'product updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand $brand
     * @param  \App\product    $product
     * @return Response
     */
    public function destroy(Brand $brand, Product $product) {
        $product->delete();

        return Redirect::route('brands.show', $brand->slug)->with('message', 'Product deleted.');
    }
    

}
