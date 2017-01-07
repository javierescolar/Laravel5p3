<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAccess extends Model
{
    protected $table = 'admin_access';
    protected $fillable = ['connect','disconnect'];
    protected $hidden = [];
    public $timestamps = false;
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
