@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <header>
        <nav class="py-3">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.posts.index')}}">Posts index</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.posts.create')}}">Create new Post</a></li>
            </ul>
        </nav>
    </header>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
