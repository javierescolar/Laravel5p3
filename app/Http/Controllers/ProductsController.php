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
        'description' => ['required'],
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

        $imagepath = "products/";
        $imagepathCarrusel = "products/carrusel/";
        
        //obtenemos el campo file definido en el formulario
        $file = $request->file('image');
        $fileCarrusel = $request->file('image_carrusel');
        
        $input = Input::all();
        $input['brand_id'] = $brand->id;
        $input['image'] = $imagepath . $file->getClientOriginalName();
        $input['image_carrusel'] = $imagepathCarrusel . $fileCarrusel->getClientOriginalName();
        $input['offer'] = (isset($input['offer']))? 1 : 0;
        $input['carrusel'] = (isset($input['carrusel']))? 1 : 0;
        
        Product::create($input);

        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('products')->put($file->getClientOriginalName(), \File::get($file));
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('carrusel')->put($fileCarrusel->getClientOriginalName(), \File::get($file));

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
        return view('products.show', compact('brand', 'product'));
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
