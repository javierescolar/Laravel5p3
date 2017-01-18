<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    
    public function getSocialAuth($provider=null)
       {
           if(!config("services.$provider")) abort('404');

           return Socialite::driver($provider)->redirect();
       }


       public function getSocialAuthCallback($provider=null)
       {
          if($userGoogle = Socialite::driver($provider)->user()){
            // return redirect()->route("profile")->with('userGoogle',$userGoogle); 
              $user = Auth::user();
              $user->name = $userGoogle->name;
              $user->email = $userGoogle->email;
              return view('auth.profile',  compact('user'));
          }else{
             return '¡¡¡Algo fue mal!!!';
          }
       }
}
