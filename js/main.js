$(function() {

    //menu fijo arriba
    var windowHeigth = $(window).height(); //almacena el alto de la pantalla
    windowHeigth = windowHeigth * 85.5 / 100; //indicamos que la altura del hero es del 85.5% y no la altura de la pantalla
    var barraAltura = $('.barra').innerHeight(); //almacena la altura de la barra

    ///marcar en que pagina estamos
    $("body.conferencia .navegacion-principal a:contains('Conferencia')").addClass('activo');
    $("body.calendario .navegacion-principal a:contains('Calendario')").addClass('activo');
    $("body.invitados .navegacion-principal a:contains('Invitados')").addClass('activo');



    $(window).scroll(function() {

        var scroll = $(window).scrollTop(); //setecta el scroll
        //validacion
        if (scroll > windowHeigth) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }

    });

    //menu amburguesa con jquery responsive

    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });




    //letering para cambiar texto rapido

    $('.nombre-sitio').lettering();


    //mostrar ocultar la parte de informacion

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



    //contador de cuenta regresiva

    $('.cuenta-regresiva').countdown('2020/08/27 00:00:00', function(event) {

        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));



    });


    ////color box


    $('.invitado-info').colorbox({ inline: true });

});