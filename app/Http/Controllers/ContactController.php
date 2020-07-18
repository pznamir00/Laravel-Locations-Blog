<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function contact()
  {
    $template = 'pages.contact';
    return view($template);
  }

  public function submit_message(Request $request)
  {
    $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
      ]);

    try
    {
      $mess = $request->input('message');
      Mail::send(['text'=>'home'], ['name'=>''], function($mess){
        $mess->to('example@gmail.com', 'To ')->subject($request->input('subject'));
        $mess->from($request->input('email'), 'From ');
      });
      return redirect('/')->with('success', 'Successful send message');
    }
    catch(Exception $e)
    {
      return redirect('/')->with('error', 'Error send message');
    }
  }
}
