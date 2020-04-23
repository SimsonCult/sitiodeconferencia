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

    //animaciones para los numeros---

    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1200);
});