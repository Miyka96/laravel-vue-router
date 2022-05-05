@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit post</h1>

    <form action="{{route('admin.posts.update',$post)}}" method="post">
        @csrf
        @method('put')

        {{-- title --}}
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert Post title" value="{{$post->title}}">
        </div>
        {{-- content --}}
        <div class="form-group">
            <label for="content">Post content</label>
            <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
        </div>

        {{-- tags --}}
        <label>Tags</label>
        <div class="d-flex" style="gap: 1rem;">
            @foreach($tags as $tag)
            <div class="form-group form-check">
                <input type="checkbox" {{$post->tags->contains($tag)? 'checked' : ''}} class="form-check-input" value="{{$tag->id}}" name="tags[]" id="tags-{{$tag->id}}">
                <label class="form-check-label" for="tags-{{$tag->id}}">{{$tag->name}}</label>
            </div>
            @endforeach
        </div>
        @error('tags')
            <div class="text-danger">{{$message}}</div>
        @enderror


        {{-- category --}}
        <div class="form-group">
            <label for="category_id">Post Category</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">No category</option>

                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>  
                @endforeach
            </select>
        </div>
        {{-- published at --}}
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
</div>


@endsection