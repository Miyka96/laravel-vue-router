@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <header>
            <nav class="py-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.posts.index') }}">Posts
                            index</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.posts.create') }}">Create new
                            Post</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Slug</td>
                <td>Published at</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($posts as $post)
                    <td>{{ $post->id }}</td>
                    <td class="text-capitalize">{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td><button class="btn btn-primary"><a class="text-white"
                                href="{{ route('admin.posts.edit', $post->id) }}">Edit</a></button></td>
                    {{-- <td>
                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                            @CSRF
                            @method('delete')
                            <button class="btn btn-primary" type="submit" onclick="return confirm('Delete this record?')"> Delete</button>
                        </form>
                    </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
