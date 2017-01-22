<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 
        'phone1', 'phone2', 'profession', 'birthdate', 
        'gener', 'aboutme', 'confirm_token',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function access() {
        $this->hasMany('App\AdminAccess');
    }

}
