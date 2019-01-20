@extends('adminlte::page')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="pull-right">
					<a href="/admin/posts/create" class="btn brn-success">Create post</a>
				</div>
				<h1>Posts</h1>
				<table class="table table-striped table-bordered">
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Created</th>
						<th>Published</th>
						<th></th>
					</tr>
					@php $i=0 @endphp
					@foreach($posts as $post)
						@php $i+=1 @endphp
						<tr>
							<td>{{ $i }}</td>
							<td>{{$post->title }}</td>
							<td>{{ $post->created_at}}</td>

							<td><a href="/admin/posts/{{$post->id }}/changestatus">@if($post->published == 1) <i class="text-success fa fa-check"></i>@else <i class="fa fa-close"> </i> @endif </a></td>
							<td width="15%">
								<a href="/admin/posts/{{ $post->id }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
								<a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<form method="post" action="/admin/posts/{{ $post->id }}" style="display: inline;">
									@csrf
									{{  method_field('DELETE') }}
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
				<div class="pagination">
					{{  $posts->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection
