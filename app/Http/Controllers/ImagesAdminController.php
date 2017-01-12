<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;
use Auth;

class ImagesAdminController extends Controller
{
    protected function rulesImages($images) {
        $correctImages = true;
        foreach ($images as $image) {
            $x = $image->getClientMimeType();
            if ($image->getClientSize() > 200000 ||
                ($image->getClientMimeType() != "image/jpeg" && $image->getClientMimeType() != "image/gif")) {
                $correctImages = false;
            }
        }
        return $correctImages;
    }

    public function index(Brand $brand, Product $product) {
        $images = $product->images()->get();
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.images.index', compact('product', 'images','access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand, Product $product) {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.images.create', compact('product','access'));
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
        (int) $count = (isset($lastImg)) ? str_replace('-', '', substr($lastImg->slug, -2)) : 0;
        if ($this->rulesImages($inputs['image'])) {
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
            $message = 'Images created.';
        } else {
            $message = 'the image size must be 200 Km max anf format accept is gif and jpeg';
        }
        return redirect()->route('adminbrands.adminproducts.adminimages.index', [$brand->slug,$product->slug])->with('message', $message);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        $images = $product->images()->get();
        return redirect()->route('adminbrands.adminproducts.adminimages.index', [$brand->slug,$product->slug])->with('message', 'Image deleted.');
    }
}
