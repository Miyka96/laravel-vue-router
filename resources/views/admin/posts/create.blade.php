@extends('layouts.app')

@section('content')

@section('content')

<h1>Create a new post</h1>

<form action="{{route('admin.posts.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="title">Post title</label>
        <input class="form-control" type="text" title="title" id="title" placeholder="Insert Post title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="content">Post content</label>
        <input type="textarea" class="form-control" name="content" id="content" placeholder="Insert post content" value="{{old('content')}}">
    <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="date" class="form-control" name="published_at" id="published_at" value="{{old('published_at')}}">
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

@endsection