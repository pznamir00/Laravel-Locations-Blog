<?php

namespace App;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class Location extends Model
{
	use Commentable;


	//categories are saving for location as 'id' of them
	public function get_category_as_string()
	{
		return Category::find($this->category)->title;
	}  
	
}
