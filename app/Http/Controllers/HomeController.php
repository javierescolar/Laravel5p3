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
       
        $arrayIps = ["83.42.84.62","90.68.31.84", "81.34.123.49"];
        $IP = $arrayIps[array_rand($arrayIps)];
        $data = ['sIPAddress' => $IP];
        $dataLocation = null;

        SoapWrapper::service('geolocation', function($service) use ($data, &$dataLocation) {
            $dataLocation = $service->call('GetLocationRawOutput', [$data])->GetLocationRawOutputResult;
        });
        $region = $dataLocation->geolocation_data->region_name;


        switch ($region) {
            case 'Catalonia':
                $localizacion['lat'] = 41.529511;
                $localizacion['lng'] = 1.772575;
                $localizacion['ciudad'] = 'Hosptalets de Pierola';
                break;
            case 'Cantabria':
                $localizacion['lat'] = 43.377822;
                $localizacion['lng'] = -4.396591;
                $localizacion['ciudad'] = 'San Vicente de la Barquera';
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
