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
	              <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
	              <h4 class="title">John Doe</h4>
	            </div>
	        </div>
	        <hr>
	        <div class="text-center">
	            <div class="row">
	                <div class="col-md-3 col-md-offset-1">
	                    <h5>28<br /><small>Links</small></h5>
	                </div>
	                <div class="col-md-4">
	                    <h5>1367<br /><small>Clicks</small></h5>
	                </div>
	                <div class="col-md-3">
	                    <h5>344<br /><small>Days</small></h5>
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
	            <form>
	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>First Name</label>
	                            <input type="text" class="form-control border-input" placeholder="First Name" value="John">
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Last Name</label>
	                            <input type="text" class="form-control border-input" placeholder="Last Name" value="Doe">
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Email address</label>
	                            <input type="email" class="form-control border-input" placeholder="Email" value="johndoe@example.com">
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input type="Password" class="form-control border-input" placeholder="Password" value="faksepassword">
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label>Re-type Password</label>
	                            <input type="password" class="form-control border-input" placeholder="Re-type Password" value="faksepassword">
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label>Website</label>
	                            <input type="text" class="form-control border-input" placeholder="Website" value="http://mysexywebsite.com/">
	                        </div>
	                    </div>
	                </div>

	                <div class="text-center">
	                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
	                </div>
	                <div class="clearfix"></div>
	            </form>
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
    $.notify({
        icon: 'ti-gift',
        message: "<strong>Success!</strong><br />Profile updated!"

    },{
        type: 'success',
        timer: 2000
    });
</script>

@stop