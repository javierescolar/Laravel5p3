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
    ];

    public function index() {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, $this->rules);

        $imagepath = "brands/";
        $input = Input::all();

        //obtenemos el campo file definido en el formulario
        $file = $request->file('logo');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        $input['logo'] = $imagepath . $nombre;

        Brand::create($input);
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('brands')->put($nombre, \File::get($file));

        return Redirect::route('brands.index')->with('message', 'Brand created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function show(Brand $brand) {
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function edit(Brand $brand) {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function update(Brand $brand, Request $request) {
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), '_method');
        $brand->update($input);

        return Redirect::route('brands.show', $brand->slug)->with('message', 'Brand updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function destroy(Brand $brand) {
        $brand->delete();

        return Redirect::route('brands.index')->with('message', 'Brand deleted.');
    }

}
