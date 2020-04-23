$(function() {


    $('div.ocultar:first').fadeIn();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {

        $('.menu-programa a').removeClass('activo');
        $(this).addClass("activo");

        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn();


        return false;
    });


});