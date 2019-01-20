@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Edit comment</h1>
				<form method="post" action="/comments/{{ $comment->id }}">
					@csrf {{ method_field("PUT") }}
					<div class="form-group">
						<label for="comment">Comment</label>
						<textarea name="comment" id="comment" class="form-control">{{ $comment->comment }}</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-lg">Update comment</button>
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection
