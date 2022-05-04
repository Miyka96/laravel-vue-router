<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Console','PC','Mobile','Extended Reality','Culture','Gameplay','News'];
        
        foreach ($categories as $cat){
            $category= new Category();

            $category->name= $cat;
            $category->slug= Str::slug($cat, '-');

            $category->save();
        }
    }
}
