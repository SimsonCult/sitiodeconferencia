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
        var divError = document.getElementById("error");
        var btnRegisto = document.getElementById("btnRegistro");
        var lista_Productos = document.getElementById("listaProductos");
        var sumaTotal = document.getElementById("sumaTotal");

        //extras
        var camisasElegidas = document.getElementById("camisaEvento");
        var etiquetasElejidas = document.getElementById("etiquetas");


        calcular.addEventListener("click", calcularMontos);
        paseDia.addEventListener("load", mostrarDias);
        pase2Dias.addEventListener("load", mostrarDias);
        paseCompleto.addEventListener("load", mostrarDias);

        setInterval(mostrarDias, 10);
        //validacion de datos de nombre apellido y email

        nombre.addEventListener("blur", validarCampos);
        apellido.addEventListener("blur", validarCampos);
        email.addEventListener("blur", validarCampos);

        function validarCampos() {
            if (this.value == "") {
                divError.style.display = "block";
                divError.innerHTML = "Completa todos los campos";
            } else {
                divError.style.display = "none";
            }
        }


        //calculos y muestra de pedido
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
                lista_Productos.style.display = "block";
                lista_Productos.innerHTML = "";
                for (var i = 0; i < listadoProductos.length; i++) {
                    lista_Productos.innerHTML += listadoProductos[i] + "<br/>";
                }

                sumaTotal.innerHTML = "$ " + totalPagar.toFixed(2);



            }
        }

        function mostrarDias() {
            var boletosDia = paseDia.value,
                boleto2Dias = pase2Dias.value,
                boletoCompleto = paseCompleto.value;

            var diasElegidos = [];
            if (boletosDia > 0) {
                diasElegidos.push("viernes");
            } else {
                document.getElementById("viernes").style.display = "none";
                document.getElementById("sabado").style.display = "none";
                document.getElementById("domingo").style.display = "none";
            }
            if (boleto2Dias > 0) {
                diasElegidos.push("viernes", "sabado");
            } else {
                document.getElementById("viernes").style.display = "none";
                document.getElementById("sabado").style.display = "none";
                document.getElementById("domingo").style.display = "none";
            }
            if (boletoCompleto > 0) {
                diasElegidos.push("viernes", "sabado", "domingo");
            } else {
                document.getElementById("viernes").style.display = "none";
                document.getElementById("sabado").style.display = "none";
                document.getElementById("domingo").style.display = "none";
            }
            for (var i = 0; i < diasElegidos.length; i++) {
                document.getElementById(diasElegidos[i]).style.display = "block";
            }

        }


    });

})();