<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Google_Client;
use Google_Service_Oauth2;
use Redirect;

class SocialController extends Controller {

    private $id_cliente = "6077178310-0j9tpids8iqqpgpc5r6bqio17mhn04ip.apps.googleusercontent.com";
    private $id_secret = "yJWqItEeQ49HnobmP1DhpmNv";
    private $redirect_uri = "http://localhost/laravel5p3/public/profile/googlesingin/callback";
    private $scope = ["https://www.googleapis.com/auth/userinfo.profile",
        "https://www.googleapis.com/auth/userinfo.email",
        "https://www.googleapis.com/auth/plus.me"
    ];

    public function getSocialAuth(Request $request) {

        $client = new Google_Client();
        $client->setClientId($this->id_cliente);
        $client->setClientSecret($this->id_secret);
        $client->setScopes($this->scope);

        $return = "";

        if ($request->session()->has('access_token')) {
            $access_token = $request->session()->get('access_token');
            $client->setAccessToken($access_token);
            $servGoogle = new Google_Service_Oauth2($client);
            $userGoogle = $servGoogle->userinfo_v2_me->get();
            $user = Auth::user();
            $user->name = (isset($userGoogle->name)) ? $userGoogle->name : $user->name;
            $user->email = (isset($userGoogle->email)) ? $userGoogle->email : $user->email;
            $user->profession = (isset($userGoogle->occupation)) ? $userGoogle->occupation : $user->profession;
            $user->birthdate = (isset($userGoogle->birthday)) ? $userGoogle->birthday : $user->bithdate;
            $user->gener = (isset($userGoogle->gender)) ? $userGoogle->gender : $user->gener;
            $return = view('auth.profile', compact('user'));
        } else {
            $return = redirect()->action('SocialController@getSocialAuthCallback');
        }
        return $return;
    }

    public function getSocialAuthCallback(Request $request) {


        $client = new Google_Client();
        $client->setClientId($this->id_cliente);
        $client->setClientSecret($this->id_secret);
        $client->setRedirectUri($this->redirect_uri);
        $client->setScopes($this->scope);

        $return = "";

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            //header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            $return = Redirect::to($auth_url);
        } else {
            $code = $_GET['code'];
            $client->authenticate($_GET['code']);
            $token_access = $client->getAccessToken();
            $_SESSION['access_token'] = $client->getAccessToken();
            session(['access_token' => $token_access]);
            //header('Location: ' . filter_var($this->redirect_uri, FILTER_SANITIZE_URL));
            $return = redirect()->action('SocialController@getSocialAuth');
        }
        return $return;
    }

}
