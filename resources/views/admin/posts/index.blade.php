@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Slug</td>
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
                        <td>{{ $post->published_at }}</td>
                        <td><button class="btn btn-primary"><a class="text-white"
                                    href="{{ route('admin.posts.edit', $post->id) }}">Edit</a></button></td>
                        <td>
                            <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
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
