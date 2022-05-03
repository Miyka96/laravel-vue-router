@extends('layouts.app')

@section('content')
    <li> <a href="{{ route('admin.posts.create') }}">Create a new post</a></li>
    @foreach ($posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
@endsection
