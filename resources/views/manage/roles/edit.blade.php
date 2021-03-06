@extends('layouts.manage') 
@section('content')
  @include('include.nav._main')
<div class="columns">
  <div class="column is-8 is-offset-2">
    <div class="panel">
      <div class="panel-heading">Create User</div>
      <div class="panel-block">
        <form class="control" action="{{route('roles.update',$role->id)}}" method="POST">
          {{ csrf_field() }} {{ method_field('PUT') }}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Display name</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control  has-icons-left">
                  <input id="display_name" name="display_name" class="input" type="text" placeholder="Enter User Friendly Name" value="{{$role->display_name}}"
                    required autofocus>
                  <span class="icon is-left">
                        <i class="fa fa-user-circle fa-fw"></i>
                      </span>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Slug Name</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control has-icons-left">
                  <input id="name" name="name" type="text" class="input" type="name" placeholder="Enter Slug Name" value="{{$role->name}}"
                    required autofocus>
                  <span class="icon is-left">
                        <i class="fa fa-envelope-o fa-fw"></i>
                      </span>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Description</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control has-icons-left">
                  <input id="description" name="description" class="input" type="text" placeholder="Write Good Description" value="{{$role->description}}"
                    required autofocus>
                  <span class="icon is-left">
                    <i class="fa fa-pencil fa-fw"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label"><label class="label">Permission</label></div>
            <div class="field-body">
              <div class="block">
                @foreach ($permissions as $permission)
                <b-checkbox native-value="{{$permission->id}}" name="permissions[]" v-model="permissionGroup">
                  {{$permission->display_name}}
                </b-checkbox>
                <br> @endforeach
              </div>
            </div>
          </div>
          <div class="field is-grouped m-l-50">
            <div class="control">
              <button type="submit" class="button is-link">Save Changes</button>
            </div>
            <div class="control">
              <a class="button is-text" href="{{route('roles.index')}}">Cancel</a>
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
      permissionGroup:{!! $role->permissions->pluck('id') !!}
		},
		methods:{
			snackbar(msg) {
					this.$snackbar.open(msg)
			},
			error(msg) {
				this.$snackbar.open({
					message:msg,
					type: 'is-danger',
					actionText:'Ok'
				})
			},
		}
	});
  let session = {!! json_encode(Session::all())!!}
  let fail = {!! json_encode($errors->all()) !!}
  let failMessage ='';
  fail.forEach(function(f){
    app.error(f);
  })
  
  if(session.hasOwnProperty('success')){
    app.snackbar(session.success);
  }else if(session.hasOwnProperty('updated')){
    app.snackbar(session.updated);
  }else if(session.hasOwnProperty('error')){
    app.error(seesion.error);
  }else{
    console.log("Nothing But Also At Last it work");
  }
</script>
@endsection