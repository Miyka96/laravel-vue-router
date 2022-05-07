<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function restore($id)
    {

        Post::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.posts.index');
    }
}

