<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
///use Request;
use Auth;
use App\User;
use Storage;
use Redirect;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {

    public function getProfile() {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function editProfile(Request $request) {
        $imagepath = "users/";

        //obtenemos el campo file definido en el formulario
        $file = $request->file('image');
        $user = Auth::user();
        //obtenemos el nombre del archivo
        if ($file != null) {
            $nombre = $file->getClientOriginalName();
            Storage::disk('users')->put($nombre, \File::get($file));
        } else if ($file == null && $user->image != 'user_default.png') {
            $nombre = str_replace($imagepath, "",$user->image);
        } else {
            $nombre = 'user_default.png';
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imagepath . $nombre;
        $user->aboutme = $request->about;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->profession = $request->profession;
        $user->birthdate = $request->birthdate;
        $user->gener = $request->gener;
        $user->save();
        return Redirect::route('profile', compact('user'))->with('message', 'change saved');
    }

    public function deleteProfile() {
        $user = Auth::user();
        Mail::send('mails.delete', ['user' => $user], function ($email) use ($user) {
            $email->from('mobileshopping@gmail.com', 'Mobile Shopping');
            $email->to($user->email, $user->name)->subject('delete account');
        });
        $user->delete();
        return view('auth.delete');
    }

}
