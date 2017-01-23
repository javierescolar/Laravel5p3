<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Brand extends Model {

    protected $table = 'brands';
    protected $fillable = ['name', 'slug', 'logo'];
    protected $hidden = ['created_at', 'updated_at'];

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function calculateDaysCreated() {
        $date1 = new DateTime($this->attributes['created_at']);
        $date2 = new DateTime(date('Y-m-d h:i:s'));
        $interval = $date1->diff($date2);
        return $interval->format('%a');
    }

}
