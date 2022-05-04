@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Slug</td>
                    <td>Category</td>
                    <td>Published at</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
    
            <tbody>
                <tr>
                    @foreach ($posts as $post)
                        <td>{{ $post->id }}</td>
                        <td class="text-capitalize">{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ isset($post->category) ? $post->category->name : '--' }}</td>
                        <td>{{ $post->published_at == null ? '--' : $post->published_at }}</td>
                        <td><button class="btn btn-primary"><a class="text-white"
                                    href="{{ route('admin.posts.edit', $post) }}">Edit</a></button></td>
                        <td>
                            <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                @CSRF
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Delete this record?')"> Delete</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
