<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->limit(30)->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'published_at' => 'nullable|date|before_or_equal:today',
            'content' => 'required|string'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
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
            'published_at' =>'nullable|date|before_or_equal:today'
        ]);

        $data = $request->all();

        if( $post->title != $data['title']){
            $slug = Post::getUniqueSlug($data['title']);
            $data['slug']=$slug;
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
