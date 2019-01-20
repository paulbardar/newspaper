@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>My posts</h1>
				@foreach($posts as $post)
					<div class="card">
						<div class="card-body">
							<div class="float-right">
								<a href="/posts/{{ $post->id }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<a href="/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<form method="post" action="/posts/{{ $post->id }}" style="display:inline-block">
									@csrf
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
								</form>
							</div>
							{{ $post->title }}
						</div>
					</div>
					<br>

				@endforeach

			</div>
		</div>
	</div>

@endsection
