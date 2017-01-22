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
        if ($user->active == 0){
            $this->logout($request);
            return redirect()->intended('login')->withInput()->with('message','User not active. Check the mail to find your activation link or register');
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
    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    
    

}
