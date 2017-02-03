<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        //return ($this->registered($request, $user))?redirect('register')->with("message",'le hemos enviado un correo') : redirect($this->redirectPath());
    
        return redirect('register')->with("message",'We have sent you a registration email');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|min:6|max:12|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['confirm_token'] = str_random(10);
        Mail::send('mails.register',['data' => $data],function($email) use ($data){
                $email->from('mobileshopping@gmail.com','Mobile Shopping');
                $email->to($data['email'],$data['name'])->subject('register account');
        });
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'aboutme' => '',
            'confirm_token' => $data['confirm_token'],
        ]);  
    }
    
    public function confirmRegister($email,$confirm_token){
        $user = new User();
        $the_user = User::where('email','=',$email)->where('confirm_token','=',$confirm_token)->get();

        if(count($the_user) > 0){
            $user->where('email','=',$email)->update(['active' => 1, 'confirm_token' => str_random(10)]);
            return redirect('login')->with('message','now you can enter');
        } else {
            return redirect('home');
        }
    }
    
    
    
}
