@extends('adminlte::page')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>{{ $post->title }}</h1>

				<div class="panel">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li>Author: {{ $post->author->profile->firstname." ".$post->author->profile->lastname }}</li>
							<li>Category: {{ $post->category->name }}</li>
							<li>Created: {{ $post->created_at }}</li>
							<li>Updated: {{ $post->updated_at }}</li>
							<li>Published: {{ $post->published }}</li>
						</ul>
					</div>
				</div>
				<div class="content">
					<div class="pull-right">
						<img src="{{ $post->image->profile->url }}">
					</div>
					{{ $post->content }}
				</div>
			</div>
		</div>
	</div>

@endsection
