<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
  public function contact()
  {
    $template = 'contact.index';
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
      Mail::send(['text'=>'home'], ['name'=>'hyj'], function($mess){
        $mess->to('pznamir00@gmail.com', 'To ')->subject("subject");
        $mess->from('pznamir00@gmail.com', 'From ');
      });
      return redirect('/')->with('success', 'Successful send message');
    }
    catch(Exception $e)
    {
      return redirect('/')->with('error', 'Error send message');
    }
  }
}
