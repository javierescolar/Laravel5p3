<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //protected $guarded = [];
     
    
    protected $table = 'brands';
    protected $fillable = ['name','slug','logo'];
    protected $hidden = ['created_at','updated_at'];
    
    
     
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
