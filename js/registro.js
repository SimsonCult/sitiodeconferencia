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
        $('#nombre').on("blur", validarCampos);
        $('#apellido').on("blur", validarCampos);
        $('#email').on("blur", validarCampos);

        //campo pases
        $('paseDia').on("load", mostrarDias);
        $('pase2Dias').on("load", mostrarDias);
        $('paseCompleto').on("load", mostrarDias);

        //botones y divs
        var btnRegisto = document.getElementById("btnRegistro");
        var lista_Productos = document.getElementById("listaProductos");
        var sumaTotal = document.getElementById("sumaTotal");

        btnRegisto.disabled = true;
        btnRegisto.style.opacity = ".5";


        //extras
        var camisasElegidas = document.getElementById("camisaEvento");
        var etiquetasElejidas = document.getElementById("etiquetas");


        $('#calcular').on("click", calcularMontos);



        setInterval(mostrarDias, 10);
        //validacion de datos de nombre apellido y email

        function validarCampos() {
            if (this.value == "") {
                $("#error").css({ 'display': 'block' });
                $("#error").text("Completa todos los campos");
            } else {
                $("#error").css({ 'display': 'none' });
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
                //funcion for en jquery
                $.each(listadoProductos, function(i, v) {
                    lista_Productos.innerHTML += listadoProductos[i] + "<br/>";
                });


                sumaTotal.innerHTML = "$ " + totalPagar.toFixed(2);

                btnRegisto.disabled = false;
                btnRegisto.style.opacity = "1";

                document.getElementById('total_pedido').value = totalPagar;

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