(function() {
    'use strict';
    var preciodia = 30,
        precio2dias = 45,
        preciocompleto = 50,
        precioCamisa = 10,
        precioEtiquetas = 2,
        descuentoCamisas = .93;
    var regalo = document.getElementById("regalo");
    document.addEventListener('DOMContentLoaded', function() {

        //campos datos usuarios
        var nombre = document.getElementById("nombre");
        var apellido = document.getElementById("apellido");
        var email = document.getElementById("email");

        //campo pases
        var paseDia = document.getElementById("paseDia");
        var pase2Dias = document.getElementById("pase2Dias");
        var paseCompleto = document.getElementById("paseCompleto");

        //botones y divs

        var calcular = document.getElementById("calcular");
        var errorDiv = document.getElementById("error");
        var btnRegisto = document.getElementById("btnRegistro");
        var resultado = document.getElementById("listaProductos");

        //extras

        var camisasElegidas = document.getElementById("camisaEvento");
        var etiquetasElejidas = document.getElementById("etiquetas");

        calcular.addEventListener("click", calcularMontos);

        function calcularMontos(event) {
            event.preventDefault();
            if (regalo.value === "") {
                alert("Debes elegir un regalo");
                regalo.focus();
            } else {
                var boletosDia = paseDia.value,
                    boleto2Dias = pase2Dias.value,
                    boletoCompleto = paseCompleto.value,
                    camisaEvento = camisasElegidas.value,
                    etiquetas = etiquetasElejidas.value;

                var totalPagar = (boletosDia * preciodia) + (boleto2Dias * precio2dias) + (boletoCompleto * preciocompleto) + ((camisaEvento * precioCamisa) * descuentoCamisas) + (etiquetas * precioEtiquetas);

                var listadoProductos = [];

                if (boletosDia >= 1) {
                    listadoProductos.push(boletosDia + " Pase/es por dia.");
                }
                if (boleto2Dias >= 1) {
                    listadoProductos.push(boleto2Dias + " Pase/es por 2 dias.");
                }
                if (boletoCompleto >= 1) {
                    listadoProductos.push(boletoCompleto + " Pase/es Completo.");
                }
                if (camisaEvento >= 1) {
                    listadoProductos.push(camisaEvento + " Camisa/as.");
                }
                if (etiquetas >= 1) {
                    listadoProductos.push(etiquetas + " Etiqueta/as.");
                }

                console.log(listadoProductos)






            }
        }


    });

})();