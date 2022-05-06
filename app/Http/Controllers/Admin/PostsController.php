<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category','tags','user'])->orderBy('created_at', 'desc')->limit(30)->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Post $post)
    {
        // aggiungere id user altrimenti non si può creare un post
        $category = Category::all();
        return view('admin.posts.create',compact('post','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // aggiungere una select sulla pag. create dove selezionare solo gli user esistenti al momento sul db
        $request->validate([
            'title' => 'required|string|max:150',
            'published_at' => 'nullable|date|before_or_equal:today',
            'content' => 'required|string',
            'category_id' =>'nullable|exists:categories,id'
        ]);

        $data = $request->all();
        $slug = Post::getUniqueSlug($data['title']);
        $post = new Post();

        $post->fill($data);
        $post->slug = $slug;

        $post->save();
        return redirect()->route('admin.posts.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        return view('admin.posts.show', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();  
        $tags = Tag::all(); 
        return view('admin.posts.edit',compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'published_at' =>'nullable|date|before_or_equal:today',
            'category_id' =>'nullable|exists:categories,id',
            'tags.*'=>'exists:tags,id'
        ]);

        $data = $request->all();

        if( $post->title != $data['title']){
            $slug = Post::getUniqueSlug($data['title']);
            $data['slug']=$slug;
        }

        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }
        else{
            $post->tags()->sync([]);
        }

        $post->update($data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
