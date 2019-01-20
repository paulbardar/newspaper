@extends('adminlte::page')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">


				<div class="panel">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li>Author: {{ $comment->author->profile->firstname." ".$comment->author->profile->lastname }}</li>
							<li>Created: {{ $comment->created_at }}</li>
							<li>Updated: {{ $comment->updated_at }}</li>
							<li>Published: {{ $comment->published }}</li>
						</ul>
					</div>
				</div>
				<div class="content">

					{{ $comment->comment }}
				</div>
			</div>
		</div>
	</div>

@endsection
