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
      $template = 'pages.one_post';
      $post = Post::findOrFail($id);
      return view($template, compact('post'));
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
