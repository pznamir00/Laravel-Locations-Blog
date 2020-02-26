<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Location;

class FilterController extends Controller
{

    public function category($category)
    {
        $template = 'filters.category';
        $category = Category::where('title', $category)->first();
        if($category)
        {
            //category exists
            $locations = Location::where('category', $category->id)->get();
            return view($template, compact('category', 'locations'));
        }
        else
        {
            //error category name
            return abort(404);
        }
    }



    public function keywords()
    {
        $template = 'filters.keywords';
        $keywords = $_GET['keywords'];
        $locations = Location::where('title', 'LIKE', '%'.$keywords.'%')->orWhere('description', 'LIKE', '%'.$keywords.'%')->get();
        return view($template, compact('keywords', 'locations'));
    }

}
