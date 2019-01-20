@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>My posts</h2>
                    <ul>
                        @foreach(auth()->user()->posts as $post)
                            <li><a href="/posts/{{ $post->id }}" >{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                    <h2>My comments</h2>
                    <ul>
                        @foreach(auth()->user()->comments as $comment)
                            <li><a href="/comments/{{ $comment->id }}" >{{ $comment->comment }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
