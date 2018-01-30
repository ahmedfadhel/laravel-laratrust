@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('superadministrator')
                        <p>This appear if user has Super Administrator Role</p>
                    @endrole
                    @role('administrator')
                        <p>This appear if user has  Administrator Role</p>
                    @endrole
                    @role('user')
                        <p>This appear if user has User Role</p>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
