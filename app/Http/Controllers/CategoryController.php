<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        if($category){
          $posts = Post::where('category_id', '=', $category->id)->with(['location', 'category'])->get();
          return view('pages.category', compact('posts'));
        }
        else {
          return redirect('/');
        }
    }
}
