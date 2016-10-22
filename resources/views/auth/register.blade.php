@extends('layouts.login')

<!-- Define page title -->
@section('title')
    Register
@stop

<!-- Define page content -->
@section('content')

<div class="modal-header">
    <h4 class="modal-title" id="login-modal-label">Register</h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }} 

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input id="name" type="text" class="form-control border-input" name="name" value="{{ old('name') }}" placeholder="Name">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

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

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control border-input" name="password_confirmation" placeholder="Re-type Password">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="fa fa-btn fa-user"></i> Register</button>
            </div>
        </div>
    </form>
</div>

@stop
