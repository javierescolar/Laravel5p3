<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;

class BrandsController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
        'logo' => ['required', 'max:200'],
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function show(Brand $brand, Request $request) {
        $numPaginate = 4;
        if (isset($request->order)) {
            $order = $request->order;
            $request->session()->set('order', $order);
        } else if ($request->session()->exists('order')) {
            $order = $request->session()->get('order');
        } else {
            $order = "";
        }

        switch ($order) {
            case 'ascPrice':
                $products = $brand->products()->orderBy('price', 'asc')->paginate($numPaginate);
                break;
            case 'descPrice':
                $products = $brand->products()->orderBy('price', 'desc')->paginate($numPaginate);
                break;
            case 'ascAlpha':
                $products = $brand->products()->orderBy('name', 'asc')->paginate($numPaginate);
                break;
            case 'descAlpha':
                $products = $brand->products()->orderBy('name', 'desc')->paginate($numPaginate);
                break;
            default :
                $products = $brand->products()->paginate($numPaginate);
        }

        return view('brands.show', compact('brand', 'products'));
    }

}
