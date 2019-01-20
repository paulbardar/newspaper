@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Create post</h1>
			<form method="post" action="/posts" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label class="control-label" for="image">Image</label>
					<input type="file" name="image" id="image" class="form-control" />
					@if($errors->has('image'))
						<span class="text-danger">{{ $errors->get('image')[0] }}</span>
					@endif
				</div>
				<div class="form-group">
					<label class="control-label" for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" />
					@if($errors->has('title'))
						<span class="text-danger">{{ $errors->get('title')[0] }}</span>
					@endif
				</div>

				<div class="form-group">
					<label for="category">Category</label>
					<select name="category" class="form-control">
						<option value="" selected disabled>Select category...</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					@if($errors->has('category'))
						<span class="tect-danger">{{ $errors->get('category')[0] }}</span>
					@endif
				</div>

				<div class="form-group">
					<label class="control-label" for="postcontent">Content</label>
					<textarea name="postcontent" id="postcontent" class="form-control">{{ old('postcontent') }}</textarea>
					@if($errors->has('content'))
						<span class="text-danger">{{ $errors->get('postcontent')[0] }}</span>
					@endif

				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg">Save post</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
