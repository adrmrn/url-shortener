@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Dashboard
@stop

<!-- Define page content -->
@section('content')

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
	                        1248
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
	                        <i class="ti-link"></i>
	                    </div>
	                </div>
	                <div class="col-xs-7">
	                    <div class="numbers">
	                        <p>Links</p>
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
	                        <p>Days</p>
	                        177
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
	            <h4 class="title">Top 3 Links</h4>
	            <p class="category">Links with the most clicks</p>
	        </div>
	        <div class="content table-responsive table-full-width">
	            <table class="table table-striped table-dashboard">
	                <thead>
	                    <th>#</th>
	                    <th>Short URL</th>
	                    <th>URL</th>
	                    <th>Description</th>
	                    <th>Clicks</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td>1</td>
	                        <td>short.es/ThbX85z</td>
	                        <td>http://planyzajec.ue.katowice.pl/plan/pla...</td>
	                        <td>Lesson plan at the University</td>
	                        <td>369</td>
	                    </tr>
	                    <tr>
	                        <td>2</td>
	                        <td>short.es/vBnM451</td>
	                        <td>http://allegro.pl/strefaokazji/kurtka-meska...</td>
	                        <td>Jacket for men</td>
	                        <td>187</td>
	                    </tr>
	                    <tr>
	                        <td>3</td>
	                        <td>short.es/6Rn23iU</td>
	                        <td>https://online.t-mobilebankowe.pl/ib/login...</td>
	                        <td>Login page</td>
	                        <td>81</td>
	                    </tr>
	                </tbody>
	            </table>

	            <div class="table-btn">
	                <a href="#" class="btn btn-info btn-fill btn-wd"><i class="ti-list"></i> View more</a>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
	    <div class="card">
	        <div class="header">
	            <h4 class="title">Clicks Statistics</h4>
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
</script>

@stop