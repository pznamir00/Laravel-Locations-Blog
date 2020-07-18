<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Location;
use App\Category;
use Auth;

class PostController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function add()
  {
      $template = 'posts.add';
      $categories = Category::all()->pluck('title');
      return view($template, compact('categories'));
  }

  public function commit(Request $request)
  {
    $this->validate($request, [
      'title'           => 'required|max:40',
      'description'     => 'required|max:255',
      'category_id'     => 'required',
      'street'          => 'required|max:32',
      'address_number'  => 'required|max:16',
      'city'            => 'required|max:32',
      'zipcode'         => 'required|max:5',
    ]);

    $post = Post::create($request->all());
    $post->category_id = $request->input('category_id') + 1;
    $post->author = Auth::user()->name;
    $post->save();

    $location = Location::create($request->all());
    $location->post_id = $post->id;
    $location->save();

    return redirect('/')->with('success', 'Post added');
  }

  public function edit($id)
  {
      $template = 'posts.edit';
      $post = Post::find($id);
      if(Auth::user()->name == $post->author)
      {
          $categories = Category::all()->pluck('title');
          return view($template, compact('post', 'categories'));
      }

      return redirect('/');
  }

  public function update(Request $request, $id)
  {
      $this->validate($request, [
        'title'           => 'required|max:40',
        'description'     => 'required|max:255',
        'category_id'     => 'required',
        'street'          => 'required|max:32',
        'address_number'  => 'required|max:16',
        'city'            => 'required|max:32',
        'zipcode'         => 'required|max:5',
      ]);

      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->description = $request->input('description');
      $post->category_id = $request->input('category_id') + 1;
      $post->save();

      $location = $post->location;
      $location->street = $request->input('street');
      $location->address_number = $request->input('address_number');
      $location->city = $request->input('city');
      $location->zipcode = $request->input('zipcode');
      $location->save();

      return redirect('/')->with('success', 'Post updated');
  }

  public function delete(Request $request)
  {
    try{
      $post = Post::find($request->input('post_id'));
      $post->location->delete();
      $post->delete();
      return redirect('/')->with('success', 'Post deleted');
    }
    catch(ErrorException $e){
      return redirect('/');
    }
  }
}
