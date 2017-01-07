<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/url-shortener-icon-apple.png') }}">
    <link rel="icon" type="image/png" sizes="62x62" href="{{ URL::asset('assets/img/url-shortener-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title') - URL Shortener</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ URL::asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">

            <div class="user-panel">
                <h4 class="title">
                    {{ Auth::user()->first_name }} {{ substr(Auth::user()->last_name, 0, 1) }}<br />
                    <small>{{ Auth::user()->roles[0]->display_name }}</small>
                </h4>
            </div>

            <hr>

            <ul class="nav">
                <li>
                    <a href="{{ URL::to('/dashboard') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/links/create') }}">
                        <i class="ti-plus"></i>
                        <p>Create Link</p>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/links') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Links List</p>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/profile') }}">
                        <i class="ti-user"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('admin'))
                    <hr>
                    <p class="text-center">Admin's tools</p>
                    <li>
                        <a href="{{ URL::to('/users') }}">
                            <i class="ti-comments-smiley"></i>
                            <p>Users List</p>
                        </a>
                    </li>
                @endif
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ URL::to('/links/create') }}" class="btn btn-danger btn-fill btn-wd"><i class="ti-plus"></i> Create Link</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/logout') }}">
                                <i class="ti-export"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright text-center">
                    <script>document.write(new Date().getFullYear())</script> &copy; Code: <a href="https://github.com/adrmrn">Adrian M</a> / Design: <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ URL::asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ URL::asset('assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ URL::asset('assets/js/bootstrap-notify.js') }}"></script>

    <!-- Paper Dashboard javascript -->
	<script src="{{ URL::asset('assets/js/paper-dashboard.js') }}"></script>

    @yield('scripts')

</html>
