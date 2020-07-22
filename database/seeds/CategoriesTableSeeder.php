<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'title' => 'Beaches',
          'slug' => 'beaches'
        ]);
        Category::create([
          'title' => 'Forests',
          'slug' => 'forests'
        ]);
        Category::create([
          'title' => 'Parks',
          'slug' => 'parks'
        ]);
        Category::create([
          'title' => 'Viewpoints',
          'slug' => 'viewpoints'
        ]);
        Category::create([
          'title' => 'Hills',
          'slug' => 'hills'
        ]);
        Category::create([
          'title' => 'Builds',
          'slug' => 'builds'
        ]);
        Category::create([
          'title' => 'Others',
          'slug' => 'others'
        ]);
    }
}
