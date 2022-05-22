require('./bootstrap');

$(document).ready(function () {


    $("#auth-form").submit(function( event ) {
        login();
        event.preventDefault();
    });


    function login() {

        var data = $("#auth-form").serialize();
        var path = $("#auth-form").attr('action');
        var cabinetUrl = $("#auth-form").attr('data-url');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: path,
            data: data,
            success: function (response) {
                window.location.href = cabinetUrl;

            }
        });


    }

})
