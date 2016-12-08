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
	                        {{ getUserClicksCount(Auth::user()) }}
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
	                        {{ $links->count() }}
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
	                        {{ getDays(Auth::user()->created_at) }}
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
	            <p class="category">Top links ever</p>
	        </div>
	        <div class="content table-responsive table-full-width">
	            <table class="table table-striped table-dashboard">
	                <thead>
	                    <th>#</th>
	                    <th>Original URL</th>
	                    <th>Short URL</th>
	                    <th>Description</th>
	                    <th>Clicks</th>
	                </thead>
	                <tbody>
	                	<?php $i = 1; ?>
	                	@foreach (getThreeTopLinks($links) as $link)
	                		<tr>
	                			<td>{{ $i++ }}</td>
	                			<td>{{ str_limit(Shortener::decodeUrl($link->url), 30) }}</td>
	                            <td>{{ getShortLink($link->short_url) }}</td>
	                            <td>{{ str_limit($link->description, 40) }}</td>
	                            <td class="text-center">{{ $link->clicks->count() }}</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>

	            <div class="table-btn">
	                <a href="{{ URL::to('/links/') }}" class="btn btn-info btn-fill btn-wd"><i class="ti-list"></i> View more</a>
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
	                    <i class="fa fa-circle text-info"></i> Clicks
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
    var json = {!! $stats !!};
    demo.initChartist(json);

    @include('layouts/notify')
</script>

@stop