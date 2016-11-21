@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Preview Link
@stop

<!-- Define page content -->
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Preview Link</h4>
                <p class="category">Share your shorter link with your friends</p>
            </div>

            <form class="dashboard-add-form">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Short link</label>
                    </div>
                    <div class="col-sm-9 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <input id="shorter-link" type="text" class="form-control border-input readonly-input" value="{{ Request::getHttpHost() }}/s/{{ $link->short_url }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">URL</label>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input id="original-url" type="text" class="form-control border-input readonly-input" value="{{ Shortener::decodeUrl($link->url) }}" readonly>
                        </div>
                    </div>
                </div>

                @if ($link->description)
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <p>{{ $link->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Share on social</label>
                    </div>
                    <div class="col-md-9">
                        <a href="#" class="icon-circle icon-circle-facebook">
                            <i class="ti-facebook"></i>
                        </a>
                        <a href="#" class="icon-circle icon-circle-twitter">
                            <i class="ti-twitter"></i>
                        </a>
                        <a href="#" class="icon-circle icon-circle-instagram">
                            <i class="ti-instagram"></i>
                        </a>
                        <a href="#" class="icon-circle icon-circle-google">
                            <i class="ti-google"></i>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 col-md-offset-3" style="padding-left: 5px; padding-top: 15px;">
                        <a href="{{ URL::to('/links/edit/' . $link->short_url) }}" class="btn btn-danger btn-fill btn-wd"><i class="ti-pencil"></i> Edit Link</a>
                        <a href="#" class="btn btn-default btn-fill btn-wd"><i class="ti-close"></i> Remove Link</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="header">
    <h4 class="title">Clicks Statistics</h4>
</div>

<div class="row">
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-warning text-left">
                            <i class="ti-hand-point-up"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Clicks</p>
                            46
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-left">
                            <i class="ti-user"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Unique Clicks</p>
                            21
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-danger text-left">
                            <i class="ti-calendar"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Days Online</p>
                            14
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Chart</h4>
                <p class="category">All time</p>
            </div>
            <div class="content">
                <div id="chartHours" class="ct-chart"></div>
                <div class="footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i> Open
                        <i class="fa fa-circle text-danger"></i> Click
                        <i class="fa fa-circle text-warning"></i> Click Second Time
                    </div>
                </div>
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
    demo.initChartist();

    @include('layouts/notify');

    $("#shorter-link, #original-url").on("click", function () {
        $(this).select();
    });
</script>

@stop