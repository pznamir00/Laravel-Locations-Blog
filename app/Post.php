<?php

namespace App;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use App\Category;


class Post extends Model
{
    use Commentable;

    protected $fillable = [
      'title', 'description'
    ];

    public function location(){
      return $this->hasOne('App\Location');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }
}
