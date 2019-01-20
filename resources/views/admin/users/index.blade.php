@extends('adminlte::page')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
			<div class="pull-right">
				<a href="/admin/users/create" class="btn brn-success">Create user</a>
			</div>
			<h1>Users</h1>
				<table class="table table-striped table-bordered">
					<tr>
						<th>#</th>
						<th>User</th>
						<th>Registred</th>
						<th>Role</th>
						<th></th>
					</tr>
					@php $i=0 @endphp
					@foreach($users as $user)
						@php $i+=1 @endphp
						<tr>
							<td>{{ $i }}</td>
							<td>{{$user->profile->firstname.' '.$user->profile->lastname }}</td>
							<td>{{ $user->created_at}}</td>
							<td>{{ $user->role }}</td>


							<td width="15%">
								<a href="/admin/users/{{ $user->id }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
								<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<form method="post" action="/admin/users/{{ $user->id }}" style="display: inline;">
									@csrf
									{{  method_field('DELETE') }}
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
				<div class="pagination">
					{{  $users->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection
