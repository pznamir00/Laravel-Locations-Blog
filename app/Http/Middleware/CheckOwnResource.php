<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Post;

class CheckOwnResource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->id;
        $post = Post::find($id);

        if(Auth::check())
          if(Auth::user()->name == $post->author)
            return $next($request);

        return redirect('/');
    }
}
