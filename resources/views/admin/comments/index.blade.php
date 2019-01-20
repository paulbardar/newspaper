@extends('adminlte::page')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
			<div class="pull-right">
				<a href="/admin/comments/create" class="btn brn-success">Create commentt</a>
			</div>
			<h1>Comments</h1>
				<table class="table table-striped table-bordered">
					<tr>
						<th>#</th>
						<th>Comment</th>
						<th>Created</th>
						<th>Published</th>
						<th></th>
					</tr>
					@php $i=0 @endphp
					@foreach($comments as $comment)
						@php $i+=1 @endphp
						<tr>
							<td>{{ $i }}</td>
							<td>{{$comment->comment }}</td>
							<td>{{ $comment->created_at}}</td>

							<td><a href="/admin/comments/{{$comment->id }}/changestatus">@if($comment->published == 1) <i class="fa fa-check"></i>@else <i class="fa fa-close"> </i> @endif </a></td>
							<td width="15%">
								<a href="/admin/comments/{{ $comment->id }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
								<a href="/admin/comments/{{ $comment->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<form method="post" action="/admin/comments/{{ $comment->id }}" style="display: inline;">
									@csrf
									{{  method_field('DELETE') }}
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
				<div class="pagination">
					{{  $comments->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection
