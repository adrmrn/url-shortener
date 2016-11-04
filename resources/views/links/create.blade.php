@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Create Link
@stop

<!-- Define page content -->
@section('content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Create short link</h4>
                <p class="category">Make your URL shorter</p>
            </div>

            {!! Form::open(['url' => '/links/create', 'method' => 'post', 'class' => 'dashboard-add-form']) !!}
                {!! Form::token() !!}

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::text('url', null, ['class' => 'form-control border-input', 'placeholder' => 'URL']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control border-input', 'placeholder' => 'Name (optional)']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::text('description', null, ['class' => 'form-control border-input', 'placeholder' => 'Description (optional)']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="ti-plus"></i> Create Link</button>
                        <a href="{{ URL::to('/dashboard') }}" class="btn btn-default btn-fill btn-wd"><i class="ti-close"></i> Cancel</a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop

<!-- Define scripts on page -->
@section('scripts')

<script type="text/javascript">
    $("#shorter-link").on("click", function () {
        $(this).select();
    });

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
</script>

@stop