<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;
use Auth;

class ProductsAdminController extends Controller {
    
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
        $products = Product::all();
        return view('admin.products.index', compact('products', 'access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand) {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
        return view('admin.products.create', compact('brand', 'access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Brand $brand,Request $request) {
        $this->validate($request, $this->rules);
        $input = Input::all();
        $input['brand_id'] = $brand->id; 
        $input['appears_on_offer'] = (isset($input['appears_on_offer'])) ? 1 : 0;
        Product::create($input);
        return Redirect::route('adminbrands.show', $brand->slug)->with('message', 'Product created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, Product $product) {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(5)->get();
        return view('admin.products.edit', compact('brand', 'product', 'access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Brand $brand, Product $product,Request $request) {
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), '_method');
        $input['appears_on_offer'] = (isset($input['appears_on_offer'])) ? 1 : 0;
        $product->update($input);

        return redirect()->route('adminbrands.adminproducts.edit', [$brand->slug, $product->slug])->with('message', 'product updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand, Product $product, Request $request) {
        $product->delete();
        return Redirect::route('products')->with('message', 'Product deleted.');
    }

}
