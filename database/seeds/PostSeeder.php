<?php

use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // assign random category_id to posts
        $categories = Category::all();
        $categoriesId= $categories->pluck('id')->all();

        // assign random tag_id to posts
        $tags = Tag::all();
        $tagsId= $tags->pluck('id')->all();
        
        for ($i=0; $i < 50 ; $i++) { 
            
            $post = new Post();
            $post->title = $faker->sentence(4);
            $post->slug = Str::slug($post->title);
            $post->content = $faker->paragraphs(10, true);
            $post->published_at = $faker->randomElement([null, $faker->dateTime()]);
            $post->category_id = $faker->randomElement($categoriesId);
            $user= User::inRandomOrder()->first();
            $post->user_id = $user->id;

            $randomTags= $faker->randomElements($tagsId, 3);

            $post->save();

            $post->tags()->attach($randomTags);
        }
    }
}
