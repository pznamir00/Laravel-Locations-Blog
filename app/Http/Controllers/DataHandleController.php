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
        return response()->json($data, 200);
    }

    public function filter()
    {
        $keywords = request('keywords');
        $data = Post::with(['location', 'category'])->where('title', 'like', '%'.$keywords.'%')->orWhere('description', 'like', '%'.$keywords.'%')->get();
        return response()->json($data, 200);
    }
}
