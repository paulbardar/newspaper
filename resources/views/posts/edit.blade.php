@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Edit {{ $post->title }}</h1>
				<form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
					@csrf
					{{ method_field("PUT") }}
					<img src="{{ $post->image->thumbnail->url }}" />
					<div class="form-group">
						<label class="control-label" for="image">Image</label>
						<input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" />
						@if($errors->has('image'))
							<span class="text-danger">{{ $errors->get('image')[0] }}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select name="category" class="form-control">
							<option value="" disabled>Select category...</option>
							@foreach($categories as $category)
								<option @if($post->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="postcontent">Content</label>
						<textarea name="postcontent" id="postcontent" class="form-control">{{ $post->content }}</textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success btn-lg">Update post</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
