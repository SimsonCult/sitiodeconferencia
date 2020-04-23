$(function() {

    $('div.ocultar:first').show();


    $('.menu-programa a').on('click', function() {

        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).show();


        return false;
    });


});