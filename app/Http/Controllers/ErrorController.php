<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
	public function error404()
	{
			$template = 'errors.404';
	    return response()->view($template)->setStatusCode(404);
	}
}
