@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Remove Link
@stop

<!-- Define page content -->
@section('content')

<div class="row">
    <div class="col-sm-12 col-lg-8 col-lg-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title">Remove</h4>
                <p class="category">Remove your short link</p>
            </div>

            {!! Form::open(['url' => '/links/remove/' . $link->short_url, 'method' => 'patch', 'class' => 'dashboard-add-form']) !!}
                {!! Form::token() !!}

                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Are you sure that you want remove <a href="{{ URL::to('/s/' . $link->short_url) }}">{{ Request::getHttpHost() }}/s/{{ $link->short_url }}</a> short link?</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="ti-trash"></i> Remove</button>
                        <a href="{{ URL::to('/links/preview/' . $link->short_url) }}" class="btn btn-default btn-fill btn-wd"><i class="ti-close"></i> Cancel</a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop