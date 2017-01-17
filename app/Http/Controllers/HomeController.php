<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Http\Requests;
use Auth;
use Redirect;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

class HomeController extends Controller {

    public function index() {
        $carruselProducts = Image::where('carrusel', 1)->get();
        $offerProducts = Image::where('offer', 1)->get();
        if (!Auth::guest()) {
            if (Auth::user()->role == "admin") {
                return redirect()->action('AdminController@index');
            } else {
                return view('home', compact('carruselProducts', 'offerProducts'));
            }
        }
        return view('home', compact('carruselProducts', 'offerProducts'));
    }

    public function search(Request $request) {
        $search = $request->keyword;
        $results = Product::where('name', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")->get();
        return $results;
    }
    
    public function map() {
        SoapWrapper::add(function ($service) {
            $service
                    ->name('geolocation')
                    ->wsdl('http://www.ipswitch.com/netapps/geolocation/iplocate.asmx?WSDL')
                    ->trace(true)
                    ->cache(WSDL_CACHE_NONE);
        });
        $arrayIps = ["62.48.135.22", "81.34.123.49", "216.98.123.99"];
        $IP = $arrayIps[array_rand($arrayIps)];
        $data = ['sIPAddress' => $IP];
        $dataLocation = null;

        SoapWrapper::service('geolocation', function($service) use ($data, &$dataLocation) {
            $dataLocation = $service->call('GetLocationRawOutput', [$data])->GetLocationRawOutputResult;
        });
        $region = $dataLocation->geolocation_data->region_name;


        switch ($region) {
            case 'New York':
                $localizacion['lat'] = 40.7509376;
                $localizacion['lng'] = -73.9875572;
                $localizacion['ciudad'] = 'New York';
                break;
            case 'Viseu':
                $localizacion['lat'] = 41.1622023;
                $localizacion['lng'] = -8.6568724;
                $localizacion['ciudad'] = 'Porto';
                break;
            case 'Madrid':
                $localizacion['lat'] = 40.549474;
                $localizacion['lng'] = -3.629175;
                $localizacion['ciudad'] = 'Alcobendas';
                break;

            default:
                break;
        }
        
        return view('soap.mapa', compact('localizacion'));
    }

}
