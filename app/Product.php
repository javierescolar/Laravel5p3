<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
     
    //protected $table = 'products';
    //protected $fillable = ['name','slug','descriptin','price','descriptin','image','image_carrusel','offer','carrusel'];
    //protected $hidden = ['created_at','updated_at'];
    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }
}
