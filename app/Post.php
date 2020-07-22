<?php

namespace App;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Category;


class Post extends Model
{
    use Commentable;

    protected $fillable = [
      'title', 'description', 'category_id'
    ];

    public function location(){
      return $this->hasOne('App\Location');
    }

    public function image(){
      return $this->hasOne('App\Image');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public static function boot() {
      parent::boot();
      static::deleting(function($post) {
           $post->location->delete();
           File::delete('media/'.$post->image->name);
           $post->image->delete();
      });
    }
}
