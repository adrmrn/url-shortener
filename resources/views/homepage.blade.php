<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/url-shortener-icon-apple.png') }}">
	<link rel="icon" type="image/png" sizes="62x62" href="{{ URL::asset('assets/img/url-shortener-icon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>URL Shortener - Make your link short.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ URL::asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/css/paper-index.css') }}" rel="stylesheet"/>


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<section id="homepage">
    <video poster="{{ URL::asset('assets/img/poster.png') }}" id="bgvid" playsinline autoplay muted loop>
        <source src="{{ URL::asset('assets/video/Typer.mp4') }}" type="video/mp4">
        <source src="{{ URL::asset('assets/video/Typer.webm') }}" type="video/webm">
    </video>

    <div id="center-block" class="text-center">
        <div id="center-content">
            <div id="center-text">
                <p>Make your link <span id="typed-element"></span>.</p>
                <button type="button" data-toggle="modal" data-target="#register-modal" class="btn btn-danger btn-fill btn-wd"><i class="ti-flag-alt-2"></i> Register</button>
                <a type="button" href="{{ url('/login') }}" class="btn btn-default btn btn-wd"><i class="ti-user"></i> Sign In</a>
            </div>
        </div>
    </div>
</section>

</body>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/typed.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

    <script>
        $(function(){
          $("#typed-element").typed({
            strings: ["short", "sexy", "cool", "nice", "rude", "super"],
            typeSpeed: 100,
            loop: true,
            backSpeed: 50
          });
        });
    </script>

    <!-- Paper Homepage javascript -->
	<script src="{{ URL::asset('assets/js/paper-index.js') }}"></script>

</html>
