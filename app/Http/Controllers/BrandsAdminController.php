<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;
use Auth;

class BrandsAdminController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:2'],
        'slug' => ['required'],
        'logo' => ['required', 'max:200'],
    ];

    public function index() {
        $brands = Brand::all();
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.brands.index', compact('brands', 'access'));
    }

    public function create() {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.brands.create', compact('access'));
    }

    public function store(Request $request) {

        $this->validate($request, $this->rules);

        $imagepath = "brands/";
        $input = Input::all();

        //obtenemos el campo file definido en el formulario
        $file = $request->file('logo');
        if ($file->getClientSize() <= 200000) {
            //obtenemos el nombre del archivo
            $nombre = $file->getClientOriginalName();

            $input['logo'] = $imagepath . $nombre;

            Brand::create($input);
            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('brands')->put($nombre, \File::get($file));

            return Redirect::route('adminbrands.index')->with('message', 'Brand created');
        }
        return Redirect::route('adminbrands.index')->with('message', "tamaño de la imagen excesivo");
    }

    public function show(Brand $brand) {
        $products = $brand->products()->get();
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.brands.show', compact('brand', 'products', 'access'));
    }

    public function edit(Brand $brand) {
        $access = \App\AdminAccess::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->take(10)->get();
        return view('admin.brands.edit', compact('brand', 'access'));
    }

    public function update(Brand $brand, Request $request) {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
        $brand_id = $request->brand_id;
        $brand = Brand::where('id', '=', $brand_id)->update(["name" => $input['name'], "slug" => $input["slug"], "logo" => $input["logo"]]);
        return redirect()->route('adminbrands.edit', [$input["slug"]])->with('message', 'Brand updated.');
    }

    public function destroy(Brand $brand) {
        $brand->delete();
        return Redirect::route('adminbrands.index')->with('message', 'Brand deleted.');
    }

}
