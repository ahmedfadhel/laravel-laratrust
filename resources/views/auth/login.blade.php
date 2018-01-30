@extends('layouts.app')

@section('content')



<div class="container">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="panel">
                <div class="panel-heading">
                    Login
                </div>
                <div class="panel-block ">
                        <form class="control" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Email</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input id="email" name="email" class="input" type="text" placeholder="Enter Your Email Address" value="{{ old('email') }}" required autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Password</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input id="password" name="password" class="input" type="password" placeholder="Enter Your Password" value="{{ old('password') }}" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="button is-primary ">
                                    Login
                                </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
