<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
      'street', 'address_number', 'city', 'zipcode'
    ];

    public function post(){
      return $this->hasOne('App\Post');
    }
}
