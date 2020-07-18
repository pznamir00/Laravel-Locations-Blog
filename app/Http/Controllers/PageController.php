<?php

namespace App\Http\Controllers;

use App\Post;
use App\Location;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Contact;
use Mail;
use Auth;


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
        if(Auth::check())
        {
            $user_posts = Post::where('author', Auth::user()->name)->get();
            return view($template, compact('user_posts'));
        }
        return redirect('/login');
    }
}
