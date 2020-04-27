<!doctype html>

<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <title>DLGwebCamp Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/normalize.css">

    <?php 
    
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php','',$archivo);
    if ($pagina == 'invitados'){
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    }else if($pagina == 'conferencia'){
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }else if($pagina == 'index'){
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    }
        
    ?>

    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">
    <meta name="theme-color" content="#fafafa">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

</head>

<body class="<?php echo $pagina ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <header class="site-header">
        <div class="hero">
            <div class="contenido-header contenedor">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fas fa-calendar-alt"></i>10-12 Dic</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Rio Gallegos, AR</p>
                    </div>

                    <h1 class="nombre-sitio">GdlWebCamp</h1>
                    <p class="slogan">La Mejor Conferencia de <span>Diseño web</span></p>
                </div>

            </div>
        </div>
        <!--Hero-->
    </header>


    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="index.php"><img src="img/logo.svg" alt="imagen de logo"></a>
            </div>
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="navegacion-principal clearfix">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
    </div>