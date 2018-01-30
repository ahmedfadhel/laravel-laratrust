@extends('layouts.manage')
@section('content')
  @include('include.nav._main')
  <div class="columns">
    <div class="column">
      <div class="panel">
        <div class="panel-heading">
          Manage Roles
          <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-5"></i>Create New permission</a>
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
              @foreach ($permissions as $permission)
                  <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->display_name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->created_at}}</td>
                    <td>
                      <a href="{{route('permissions.edit',$permission->id)}}" class="button is-primary">
                        <span class="icon">
                          <i class="fa fa-pencil-square-o"></i>
                        </span>
                        <span>Edit</span>
                      </a>
                      <a href="{{route('permissions.destroy',$permission->id)}}" class="button is-danger">
                        <span class="icon">
                          <i class="fa fa-trash"></i>
                        </span>
                        <span>Delete</span>
                      </a>
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