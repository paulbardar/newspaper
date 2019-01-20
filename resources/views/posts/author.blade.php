@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $author->profile->firstname." ".$author->profile->lastname }}</h1>
			@foreach($posts as $post)
			<div class="card">
				<div class="card-body">

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
				{{ $posts->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
