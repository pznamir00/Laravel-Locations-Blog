<?php

namespace App\Http\Controllers;

use App\Location;
use App\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



	public function add()
	{
        $template = 'location.add';
        $categories = Category::all()->pluck('title');
	    return view($template, compact('categories'));
	}



    public function add_action(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|max:255',
    		'address' => 'required',
            'category' => 'required',
    	]);

    	$loc = new Location;
    	$loc->title = $request->input('title');
       	$loc->address = $request->input('address');
    	$loc->description = $request->input('description');
        $loc->author = Auth::user()->name;
        $loc->category = $request->input('category') + 1;
    	$loc->save();

    	return redirect('/')->with('success', 'Location added');
    }



    public function edit($id)
    {
        $template = 'location.edit';
        $location = Location::find($id);
        if(Auth::user()->name == $location->author)
        {
            $categories = Category::all()->pluck('title');
            return view($template, compact('location', 'categories'));
        }
        
        return redirect('/');
    }



    public function edit_action(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'address' => 'required',
            'category' => 'required',
        ]);

        $loc = Location::find($id);
        $loc->title = $request->input('title');
        $loc->address = $request->input('address');
        $loc->description = $request->input('description');
        $loc->category = $request->input('category') + 1;
        $loc->save();

        return redirect('/')->with('success', 'Location updated');
    }



    public function delete($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect('')->with('success', 'Location deleted');
    }
}
