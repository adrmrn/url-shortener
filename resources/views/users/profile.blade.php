@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Profile
@stop

<!-- Define page content -->
@section('content')

<div class="row">
	<div class="col-lg-4 col-md-5">
	    <div class="card card-user edit-user">
	        
	        <div class="content">
	            <div class="author">
		            <h4 class="title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
	                  	<br /><small>{{ Auth::user()->roles[0]->display_name }}</small>
		            </h4>
	            </div>
	        </div>
	        <hr>
	        <div class="text-center">
	            <div class="row">
	                <div class="col-md-3 col-md-offset-1">
	                    <h5>{{ Auth::user()->links->count() }}<br /><small>Links</small></h5>
	                </div>
	                <div class="col-md-4">
	                    <h5>{{ getUserClicksCount(Auth::user()) }}<br /><small>Clicks</small></h5>
	                </div>
	                <div class="col-md-3">
	                    <h5>{{ getDays(Auth::user()->created_at) }}<br /><small>Days</small></h5>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="col-lg-8 col-md-7">
	    <div class="card">
	        <div class="header">
	            <h4 class="title">Edit Profile</h4>
	            <p class="category">If you don't want change password, just let empty fields</p>
	        </div>
	        <div class="content">
	        	{!! Form::model(Auth::user(), ['url' => '/profile', 'method' => 'patch']) !!}
                	{!! Form::token() !!}

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>First Name</label>
	                            {!! Form::text('first_name', null, ['class' => 'form-control border-input', 'placeholder' => 'First Name']) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Last Name</label>
	                            {!! Form::text('last_name', null, ['class' => 'form-control border-input', 'placeholder' => 'Last Name']) !!}
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Email address</label>
	                            {!! Form::email('email', null, ['class' => 'form-control border-input', 'placeholder' => 'Email']) !!}
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Password</label>
	                            {!! Form::password('password', ['class' => 'form-control border-input', 'placeholder' => 'Password']) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Re-type Password</label>
	                            {!! Form::password('password_confirmation', ['class' => 'form-control border-input', 'placeholder' => 'Re-type Password']) !!}
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label>Website</label>
	                            {!! Form::text('website', null, ['class' => 'form-control border-input', 'placeholder' => 'Website']) !!}
	                        </div>
	                    </div>
	                </div>

	                <div class="text-center">
	                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
	                </div>
	                <div class="clearfix"></div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>


	</div>

@stop

<!-- Define scripts on page -->
@section('scripts')

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ URL::asset('assets/js/demo.js') }}"></script>

<script type="text/javascript">
	@if (count($errors) > 0)
        $.notify({
            icon: 'ti-alert',
            message: "<strong>Error!</strong><br />"
                @foreach ($errors->all() as $error) 
                    + "<li>{{ $error }}</li>"
                @endforeach

        },{
            type: 'danger',
            timer: 4000
        });
    @endif

    @include('layouts/notify')
</script>

@stop