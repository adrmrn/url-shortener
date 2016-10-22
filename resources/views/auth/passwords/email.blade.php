@extends('layouts.login')

<!-- Define page title -->
@section('title')
    Reset Password
@stop

<!-- Define page content -->
@section('content')

<div class="modal-header">
    <h4 class="modal-title" id="login-modal-label">Reset Password</h4>
</div>
<div class="modal-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
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

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="fa fa-btn fa-envelope"></i> Send Password Reset Link</button>
            </div>
        </div>
    </form>
</div>

@stop
