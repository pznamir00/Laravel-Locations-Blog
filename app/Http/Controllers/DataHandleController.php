<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Location;

class DataHandleController extends Controller
{
    public function all()
    {
      $data = Post::with(['location', 'category'])->get();
      return response()->json($data);
    }

    public function filter(Request $request)
    {
      $keyword = $request->input('keyword');
      $data = Post::with(['location', 'category'])->where('title', 'like', '%'.$keyword.'%')->orWhere('description', 'like', '%'.$keyword.'%')->get();
      return response()->json($data);
    }
}
