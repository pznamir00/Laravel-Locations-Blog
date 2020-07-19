<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Location;
use Illuminate\Database\QueryException;


class PageController extends Controller
{

    public function index()
    {
        $template = 'pages.index';
        return view($template);
    }


    public function one_post($id)
    {
      try{
        $template = 'pages.one_post';
        $post = Post::find($id);
        if($post)
          return view($template, compact('post'));
        abort(404);
      }
      catch(QueryException $e){
        return redirect('/');
      }
    }


    public function about_us()
    {
      $template = 'pages.about-us';
    	return view($template);
    }


    public function account()
    {
        $template = 'pages.account';
        $user_posts = Post::where('author', Auth::user()->name)->get();
        return view($template, compact('user_posts'));
    }
}
