<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index($slug)
    {
      try{
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->with(['location', 'category'])->get();
        return view('pages.category', compact('posts'));
      } catch(\ErrorException $e){
        return redirect('/');
      }
    }
}
