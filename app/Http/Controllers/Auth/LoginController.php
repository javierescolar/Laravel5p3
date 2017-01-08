<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AdminAccess;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated(Request $request, $user) {
        if ($user->role == "admin") {
            //updateo una posible sesion sin cerrar
            AdminAccess::where('user_id', Auth::id())
                    ->orderBy('id', 'desc')
                    ->limit(1)
                    ->update(['disconnect' => date('Y-m-d H:i:s')]);

            //creo un nuevo registro
            $access = new AdminAccess();
            $access->user_id = $user->id;
            $access->connect = date('Y-m-d H:i:s');
            $access->disconnect = date('Y-m-d H:i:s');
            $access->save();
            return redirect()->intended('homeAdmin');
        }
        return redirect()->intended('home');
    }

    public function logout(Request $request) {
        AdminAccess::where('user_id', Auth::id())
                ->orderBy('id', 'desc')
                ->limit(1)
                ->update(['disconnect' => date('Y-m-d H:i:s')]);

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    public function username() {
        return 'username';
    }

}
