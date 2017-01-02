<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //protected $guarded = [];
    
    protected $table = 'images';
    protected $fillable = ['location','slug','offer','carrusel','gallery'];
    protected $hidden = ['created_at','updated_at'];
    
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
