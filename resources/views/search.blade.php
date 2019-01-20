@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Search: {{ request()->str }}</h1>
				@foreach($results as $post)
				<div class="card">
					<div class="card-body">
						<div class="text-left">
							<strong>Author</strong><a href="/author/{{ $post->author->id}}">
							{{ $post->author->profile->firstname }} {{ $post->author->profile->lastname }}
						</a>
					</div>
					<h3>{{ $post->title }}</h3>
					<p>{{ substr($post->content, 0, 150 ) }}...</p>
					<p class="text-right">
						<a href="/posts/{{ $post->id}}">Read more...</a>
					</p>
				</div>
			</div>
			<br>
				@endforeach
				<div class="pagination">
					{{ $results->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection
