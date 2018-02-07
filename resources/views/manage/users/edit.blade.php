@extends('layouts.manage') 
@section('content')
	@include('include.nav._main')
<div class="columns">
	<div class="column is-8 is-offset-2">
		<div class="panel">
			<div class="panel-heading">Create User</div>
			<div class="panel-block">
				<form class="control" action="{{route('users.update',$user->id)}}" method="POST">
					{{ csrf_field() }} {{ method_field('PUT') }}
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Name</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control  has-icons-left">
									<input id="name" name="name" class="input" type="text" placeholder="Enter User Name" required autofocus value="{{$user->name}}">
									<span class="icon is-left">
                        <i class="fa fa-user-circle fa-fw"></i>
                      </span>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Email</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control has-icons-left">
									<input id="email" name="email" class="input" type="email" placeholder="Enter User Email" required autofocus value="{{$user->email}}"
									 disabled>
									<span class="icon is-left">
                        <i class="fa fa-envelope-o fa-fw"></i>
                      </span>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label"><label class="label">Roles</label></div>
						<div class="field-body">
							@foreach ($roles as $role)
							<b-checkbox native-value="{{$role->id}}" name="roles[]" true-value="true" v-model="roleGroup">
								{{$role->display_name}}
							</b-checkbox>
							@endforeach
						</div>
					</div>
					<div class="field is-grouped m-l-50">
						<div class="control">
							<button type="submit" class="button is-link">Save Changes</button>
						</div>
						<div class="control">
							<a class="button is-text" href="{{route('users.index')}}">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
 
@section('scripts')
<script>
	var app = new Vue({
    el: '#app',
    data: {
      roleGroup:{!! $user->roles->pluck('id') !!}
		},
		methods:{
			snackbar(msg) {
					this.$snackbar.open(msg)
			},
			error() {
				this.$snackbar.open({
					message:session.error,
					type: 'is-danger',
					actionText:'Ok'
				})
			},
		}
	});
	let session = {!! json_encode(Session::all())!!}
	
	if(session.hasOwnProperty('success')){
		app.snackbar(session.success);
	}else if(session.hasOwnProperty('updated')){
		app.snackbar(session.updated);
	}else if(session.hasOwnProperty('error')){
		app.error();
	}else{
		console.log("Nothing But Also At Last it work");
	}
</script>
@endsection