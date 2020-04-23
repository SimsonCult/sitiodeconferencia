(function() {
    'use strict';
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

        calcular.addEventListener("click", calcularMontos);

        function calcularMontos(event) {
            event.preventDefault();
            if (regalo.value === "") {
                alert("Debes elegir un regalo");
                regalo.focus();
            } else {
                console.log("ya elegiste regalo")
            }
        }


    });

})();