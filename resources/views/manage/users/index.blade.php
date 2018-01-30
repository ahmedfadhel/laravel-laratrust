@extends('layouts.manage') 
@section('content')
	@include('include.nav._main')
<div class="columns">
	<div class="column">
		<div class="panel">
			<div class="panel-heading">
				Manage Users
				<a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-5"></i>Create New User</a>
				<div class="is-clearfix"></div>
			</div>
			<div class="panel-block">
				<table class="table is-fullwidth ">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Created At</th>
							<th>Control</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								@if (count($user->roles) == 1) {{$user->roles[0]->display_name}} @else @foreach ($user->roles as $role) - {{$role->display_name}}
								<br> @endforeach @endif
							</td>
							<td>{{$user->created_at}}</td>
							<td>
								 {{-- <a href="{{route('users.destroy',$user->id)}}" class="button is-danger">
									<span class="icon">
										<i class="fa fa-trash"></i>
									</span>
									<span>Delete</span>
								</a> --}}
								<form id="delete" class="field is-horizontal"action="{{ route('users.destroy',$user->id) }}" method="POST">
										<a href="{{route('users.edit',$user->id)}}" class="button is-primary">
											<span class="icon">
												<i class="fa fa-pencil-square-o"></i>
											</span>
											<span>Edit</span>
										</a>
									{{ csrf_field() }} {{ method_field('Delete') }}
									<button type="submit" class="button is-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection