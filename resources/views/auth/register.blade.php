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
    {!! Form::open(['url' => '/register', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        {{ csrf_field() }} 

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {!! Form::text('first_name', null, ['class' => 'form-control border-input', 'placeholder' => 'First Name']) !!}

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {!! Form::text('last_name', null, ['class' => 'form-control border-input', 'placeholder' => 'Last Name']) !!}

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {!! Form::email('email', null, ['class' => 'form-control border-input', 'placeholder' => 'Email']) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {!! Form::password('password', ['class' => 'form-control border-input', 'placeholder' => 'Password']) !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {!! Form::password('password_confirmation', ['class' => 'form-control border-input', 'placeholder' => 'Re-type Password']) !!}

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
