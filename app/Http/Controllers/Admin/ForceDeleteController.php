<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;

   
   
class ForceDeleteController extends Controller{

    public function destroy($id)
    {
            Post::where('id', $id)->withTrashed()->forceDelete();
            return redirect()->route('admin.trash');
    }

} 