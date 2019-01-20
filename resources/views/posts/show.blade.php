@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="post-image float-right">
					<img src="{{ $post->image->profile->url }}" />
				</div>
				<h1>{{ $post->title }}</h1>
				<div><strong>Created: </strong>{{ $post->created_at->diffForHumans() }}</div>
				<p>{{ $post->content }}</p>
				<h1>Comments</h1>
				@foreach($post->comments as $comment)
					<div class="card">
						<div class="card-body">
							{{ $comment->comment }}
						</div>
					</div>
					<br>
				@endforeach
			</div>
		</div>
	</div>

@endsection
