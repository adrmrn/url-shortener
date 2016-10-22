<!DOCTYPE html>
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
    <link href="{{ URL::asset('assets/css/paper-index.css') }}" rel="stylesheet"/>


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<section id="homepage">
    <video poster="{{ URL::asset('assets/img/poster.png') }}" id="bgvid" playsinline autoplay muted loop class="blur-background">
        <source src="{{ URL::asset('assets/video/Typer.mp4') }}" type="video/mp4">
        <source src="{{ URL::asset('assets/video/Typer.webm') }}" type="video/webm">
    </video>

    <div id="center-block" class="text-center">
        <div id="center-content">
            <div style="display: inline;">
                <div id="login-modal-dialog" class="modal-dialog modal-sm" role="document">
                    <div class="back-to-homepage">
                        <a href="{{ url('/') }}"><i class="ti-arrow-left"></i> Back to Homepage</a>
                    </div>
                    <div class="modal-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

    <!-- Paper Homepage javascript -->
    <script src="{{ URL::asset('assets/js/paper-index.js') }}"></script>

</html>
