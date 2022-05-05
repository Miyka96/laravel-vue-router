<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Indie','Next-Gen','Adventure','Arcade','Horror','Platform','Action','RPG'];
        
        foreach ($tags as $t){
            $tag = new Tag();

            $tag->name= $t;
            $tag->slug= Str::slug($t, '-');

            $tag->save();
        }
    }
}
