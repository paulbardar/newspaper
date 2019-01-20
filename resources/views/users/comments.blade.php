@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>My comments</h1>
				@foreach($comments as $comment)
					<div class="card">
						<div class="card-body">
							<div class="float-right">
								<a href="/comments/{{ $comment->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
							</div>
							{{ $comment->comment }}
						</div>
					</div>
				@endforeach


			</div>
		</div>
	</div>

@endsection
