@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Edit Link
@stop

<!-- Define page content -->
@section('content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit link</h4>
                <p class="category">Edit your short URL</p>
            </div>

            <form class="dashboard-add-form">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control border-input" placeholder="URL">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control border-input" placeholder="Name (optional)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control border-input" placeholder="Description (optional)">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="ti-pencil"></i> Edit Link</button>
                        <button type="submit" class="btn btn-default btn-fill btn-wd"><i class="ti-close"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
