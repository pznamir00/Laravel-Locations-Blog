<?php

namespace App\Http\Controllers;

use App\Page;
use App\Location;
use App\Category;
use Illuminate\Http\Request;
use App\Contact;
use Mail;
use Auth;


class PageController extends Controller
{


    public function index()
    {
        $template = 'pages.index';
        $locations = Location::all();
        return view($template, compact('locations'));
    }



    public function one_location($id)
    {
        if(is_numeric($id))
        {
            $template = 'pages.one_location';
            $location = Location::find($id);
            $cat = $location->get_category_as_string();
            return view($template, compact('location', 'cat'));
        }
        
        return redirect('/');
    }



    public function contact()
    {
        $template = 'pages.contact';
    	return view($template);
    }



    public function contact_send(Request $request)
    {
    	$this->validate($request, [
    			'email' => 'required|email',
    			'subject' => 'required',
    			'message' => 'required',
    		]);

    	Contact::create($request->all());
    	
    	try
    	{
	    	/*$mess = $request->input['message'];
	    	Mail::send(['text'=>'home'], ['name'=>''], function($mess){
	    		$mess->to('', 'To ')->subject('Subject');
	    		$mess->from('', 'From ');
	    	});*/

	    	return redirect('/')->with('success', 'Success send message');
	    }
	    catch(Exception $e)
	    {
	    	return redirect('/')->with('error', 'Error send message');
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
            $user_locations = Location::where('author', Auth::user()->name)->get();
            return view($template, compact('user_locations'));
        }

        return redirect('/login');
    }
}
