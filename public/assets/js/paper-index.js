$(window).on('ready resize', function() {
    var height = $(window).height();
    $('#center-block').css('height', height);
});

// $('#homepage #center-block button').on('click', function() {
//    $('#homepage').css({webkitFilter: 'blur(5px)', transition: '0.5s'});
// });

$('#login-modal').on('hide.bs.modal', function () {
    $('#homepage').css({webkitFilter: 'blur(0)', transition: '0.5s'});
});

$('#login-modal').on('show.bs.modal', function () {
    $('#homepage').css({webkitFilter: 'blur(5px)'});
})