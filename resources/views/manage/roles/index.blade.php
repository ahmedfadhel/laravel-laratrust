@extends('layouts.manage') 
@section('content')
  @include('include.nav._main')
<div class="columns">
  <div class="column">
    <div class="panel">
      <div class="panel-heading">
        Manage Roles
        <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-5"></i>Create New Role</a>
        <div class="is-clearfix"></div>
      </div>
      <div class="panel-block">
        <table class="table is-fullwidth ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Display Name</th>
              <th>Description</th>
              <th>Created At</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
            <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->display_name}}</td>
              <td>{{$role->description}}</td>
              <td>{{$role->created_at}}</td>
              <td>
                <form id="delete" class="field is-horizontal" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                  {{csrf_field()}}
                  <p class="control">
                    <a href="{{route('roles.edit',$role->id)}}" class="button is-primary">
                      <span class="icon">
                        <i class="fa fa-pencil-square-o"></i>
                      </span>
                      <span>Edit</span>
                    </a>
                  </p>
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
 
@section('scripts')
<script>
  let app = new Vue({
		el:'#app',
		data:{
			
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