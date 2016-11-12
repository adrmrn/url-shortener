@if (Session::has('flash_status'))
	var type = ['danger','success','warning','info'];
	var title = ['Error', 'Success', 'Warning', 'Info'];

    $.notify({
        icon: 'ti-gift',
        message: "<strong>" + title[{{ ucwords(Session::get('flash_status')) }}] + "!</strong><br />{{ Session::get('flash_message') }}"

    },{
        type: type[{{ Session::get('flash_status') }}],
        timer: 2000
    });
@endif