<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'slug',
        'category_id',
        'tag_id',
        'user_id'
    ];

    public static function getUniqueSlug($title){
        $slug = Str::slug($title);
        $slug_base = $slug;
        $counter = 1;
        $post_present = Post::where('slug', $slug)->first();

        while($post_present){
            $slug =  $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        }   

        return $slug;
    }

    public function getRouteKeyName()
    {
       return 'slug';
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
