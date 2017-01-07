@extends('layouts.login')

<!-- Define page title -->
@section('title')
    Sign In
@stop

<!-- Define page content -->
@section('content')

<div class="modal-header">
    <h4 class="modal-title" id="login-modal-label">Sign In</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input id="email" type="email" class="form-control border-input" name="email" value="{{ old('email') }}" placeholder="Email">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input id="password" type="password" class="form-control border-input" name="password" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="ti-unlock"></i> Login</button>
            </div>
        </div>

        <!--<p class="text-center"><a href="{{ url('/password/reset') }}">Forgot Your Password?</a></p>-->
    </form>
</div>

@stop
