@extends('layouts.manage')

@section('content')
    @include('include.nav._main')
    <div class="columns">
        <div class="column">
            <div class="notification is-success">
                <div class="delete"></div>
                This is notification area
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div class="is-pulled-left m-r-10">
                        <span>
                            <i class="fa fa-users fa-fw fa-2x"></i>
                        </span>
                    </div>
                    <div class="is-pulled-right">
                        <p class="title">{{$users->count()}}</p>
                        <p class="heading">User</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="is-pulled-left m-r-10">
                        <span>
                            <i class="fa fa-server fa-fw fa-2x"></i>
                        </span>
                    </div>
                    <div class="is-pulled-right">
                        <p class="title">80</p>
                        <p class="heading">Images</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="is-pulled-left m-r-10">
                        <span>
                            <i class="fa fa-sitemap fa-fw fa-2x"></i>
                        </span>
                    </div>
                    <div class="is-pulled-right">
                        <p class="title">80</p>
                        <p class="heading">Video</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="is-pulled-left m-r-10">
                        <span>
                            <i class="fa fa-ticket fa-fw fa-2x"></i>
                        </span>
                    </div>
                    <div class="is-pulled-right">
                        <p class="title">80</p>
                        <p class="heading">Docs</p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <div class="panel">
                <div class="panel-heading">
                    Users
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{$role->display_name}}
                                            
                                        @endforeach
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
