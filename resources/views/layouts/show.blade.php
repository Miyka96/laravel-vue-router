@extends('layouts.app')
    

    @section('content')
    
    <div class="container mb-5">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
            Show Post Preview
        </a>
        <div class="card border-0" style="width:1080px;">
            {{-- <img class="card-img-top" src="#" style="width:100%"> --}}
            <div class="card-body collapse" id="collapse">
              <h4 class="card-title text-capitalize display-5">{{$post->title}}</h4>
              <p class="card-text">{{$post->content}}</p>
            
                <div>
                    <span class="text-primary">Tags</span>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-info">{{$tag->name}}</span>
                    @endforeach
                </div>


                <div>
                    <span class="text-primary">Category</span>
                    <span class="badge badge-info">{{ isset($post->category) ? $post->category->name : '--' }}</span>
                </div>

                <div>
                    <span class="text-secondary">Published at:</span>
                    <span class="text-secondary">{{ $post->published_at == null ? '--' : $post->published_at }}</span>
                </div>

            </div>
          </div>
    </div>

    @yield('section')

    @endsection

    