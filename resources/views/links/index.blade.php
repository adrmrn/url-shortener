@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Links List
@stop

<!-- Define page content -->
@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">All Links</h4>
            <p class="category">Here are your all shorter links</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-dashboard">
                <thead>
                    <th>Original URL</th>
                    <th>Short URL</th>
                    <th>Description</th>
                    <th class="text-center">Clicks</th>
                    <th class="text-center">Preview</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td><a href="{{ Shortener::decodeUrl($link->url) }}">{{ str_limit(Shortener::decodeUrl($link->url), 30) }}</a></td>
                            <td><a href="{{ URL::to('/s/' . $link->short_url) }}">{{ getShortLink($link->short_url) }}</a></td>
                            <td>{{ str_limit($link->description, 40) }}</td>
                            <td class="text-center">{{ $link->clicks->count() }}</td>
                            <td class="text-center"><a href="{{ URL::to('/links/preview/' . $link->short_url) }}" class="manage-icons"><i class="ti-eye"></i></a></td>
                            <td class="text-center"><a href="{{ URL::to('/links/edit/' . $link->short_url) }}" class="manage-icons"><i class="ti-pencil"></i></a></td>
                            <td class="text-center"><a href="{{ URL::to('/links/remove/' . $link->short_url) }}" class="manage-icons"><i class="ti-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="text-center">
                {{ $links->links() }}                
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
    @include('layouts/notify')
</script>

@stop