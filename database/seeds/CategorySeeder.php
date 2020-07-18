<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category;
        $cat->title = "Parks";
        $cat->slug = "parks";
        $cat->save();

        $cat = new Category;
        $cat->title = "Forests";
        $cat->slug = "forests";
        $cat->save();

        $cat = new Category;
        $cat->title = "Lakes";
        $cat->slug = "lakes";
        $cat->save();
    }
}
