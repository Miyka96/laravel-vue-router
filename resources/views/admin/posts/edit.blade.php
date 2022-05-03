@extends('layouts.app')

@section('content')

<h1>Edit post</h1>

<form action="{{route('admin.posts.update',$post)}}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Insert Post title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="content">Post content</label>
        <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
    <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="date" class="form-control" name="published_at" id="published_at" value="{{$post->published_at}}">
    </div>

    <button class="btn btn-primary" type="submit">
        Edit
    </button>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

</form>

@endsection