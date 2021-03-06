<?php include_once 'includes\templates\header.php'; ?>

    <section class="seccion contenedor">
        <h2>La mejor Conferencia de Diseño Web en Español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus corporis eius earum tempora excepturi, incidunt aspernatur molestias, tempore accusamus sequi iusto dignissimos. Doloribus maiores similique dolore voluptatibus blanditiis sequi
            pariatur. eveniet placeat architecto omnis voluptatum saepe eaque, officiis excepturi alias vel doloremque est, quod iusto quis dolore debitis hic ea. </p>
    </section>



    <section class="programa">
        <div class="contenedor-video">
            <video loop autoplay muted>
                <source src="video/video.mp4" type="video/mp4">
                    <source src="video/video.webm" type="video/webm">
                        <source src="video/video.ogv" type="video/ogv">
            </video>
        </div>

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>
                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = ' SELECT * FROM `categoria_evento`';
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                     ?>
                     
                    <nav class="menu-programa">
                    <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)){  ?>
                        <?php $categoria = $cat['cat_evento']; ?>
                        <a href="#<?php echo strtolower($categoria) ?>"><i class="fa <?php echo $cat['icono'] ?> "></i> <?php echo $categoria ?></a>
                    <?php } ?> <!-- fin del while -->
                    </nav>
                    
                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');

                            $sql = ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono , nombre_invitado, apellido_invitado ';
                            $sql .= ' FROM eventos ';
                            $sql .= ' INNER JOIN categoria_evento ';
                            $sql .= ' ON eventos.id_cat_evento = categoria_evento.id_categoria ';
                            $sql .= ' INNER JOIN invitados ';
                            $sql .= ' ON eventos.id_inv = invitados.invitado_id ';
                            $sql .= ' AND eventos.id_cat_evento = 1';
                            $sql .= ' ORDER BY evento_id  LIMIT 2;';
                            $sql .= ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono , nombre_invitado, apellido_invitado ';
                            $sql .= ' FROM eventos ';
                            $sql .= ' INNER JOIN categoria_evento ';
                            $sql .= ' ON eventos.id_cat_evento = categoria_evento.id_categoria ';
                            $sql .= ' INNER JOIN invitados ';
                            $sql .= ' ON eventos.id_inv = invitados.invitado_id ';
                            $sql .= ' AND eventos.id_cat_evento = 2';
                            $sql .= ' ORDER BY evento_id  LIMIT 2;';
                            $sql .= ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono , nombre_invitado, apellido_invitado ';
                            $sql .= ' FROM eventos ';
                            $sql .= ' INNER JOIN categoria_evento ';
                            $sql .= ' ON eventos.id_cat_evento = categoria_evento.id_categoria ';
                            $sql .= ' INNER JOIN invitados ';
                            $sql .= ' ON eventos.id_inv = invitados.invitado_id ';
                            $sql .= ' AND eventos.id_cat_evento = 3';
                            $sql .= ' ORDER BY evento_id  LIMIT 2;';
            
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <?php 
                    $conn->multi_query($sql);
                        do {
                            $resultado = $conn-> store_result();
                            $row = $resultado-> fetch_all(MYSQLI_ASSOC); ?>

                            <?php $i = 0;  ?>
                            <?php foreach($row as $evento):  ?>
                                <?php if ($i % 2 == 0){  ?>
                                    <div id="bn  xc   <?php echo strtolower($evento['cat_evento']);  ?>" class="info-curso ocultar clearfix">
                                <?php } ?>
                                    
                                        <div class="detalle-evento evento1">
                                            <h3> <?php echo utf8_encode($evento['nombre_evento']);  ?></h3>
                                            <p><i class="fa fa-clock"></i>  <?php echo $evento['hora_evento'];  ?></p>
                                            <p><i class="fa fa-calendar"></i> </i>  <?php echo $evento['fecha_evento'];  ?></p>
                                            <p><i class="fa fa-user"></i> </i>  <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?></p>
                                        </div>
                                                        
                                <?php if ($i % 2 == 1){  ?>
                                    <a href="#" class="boton float-rigth">Ver todos</a>
                                    </div>
                                <?php } 
                                 $i++ ;  
                         endforeach;  
                        $resultado -> free();   
                        } while ($conn -> more_results() && $conn ->next_result());  ?>


                </div>
            </div>
        </div>
        <?php  $conn->close();    ?> <!-- cerramos la conexion-->
    </section>

    <?php include_once 'includes\templates\invitados.php'; ?>
   

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p>Invitados
                </li>
                <li>
                    <p class="numero"></p>talleres
                </li>
                <li>
                    <p class="numero"></p>dias
                </li>
                <li>
                    <p class="numero"></p>conferencias
                </li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-pecio">
                        <h3>Pase por Día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>Bodadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="boton hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-pecio">
                        <h3>Todos los Dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li>Bodadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="boton">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-pecio">
                        <h3>Pase por 2 Días</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>Bodadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="boton hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div class="mapa" id="mapa">
        <!--Incrustamos el mapa con JavasCript-->
    </div>


    <!--Testimoonial-->
    <section class="seccion">

        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique totam quis accusantium nobis rem provident ratione velit? Nesciunt soluta architecto, voluptas perferendis quod omnis ipsa nam explicabo libero deleniti vero?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Osbaldo Apontes EScovedo <span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique totam quis accusantium nobis rem provident ratione velit? Nesciunt soluta architecto, voluptas perferendis quod omnis ipsa nam explicabo libero deleniti vero?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Osbaldo Apontes EScovedo <span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique totam quis accusantium nobis rem provident ratione velit? Nesciunt soluta architecto, voluptas perferendis quod omnis ipsa nam explicabo libero deleniti vero?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Osbaldo Apontes EScovedo <span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!--newsletter-->
    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Registrate en NewSletter</p>
            <h3>dglwebcamp</h3>
            <a href="#" class="boton transparente">Registro</a>
        </div>
    </div>



    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p class="numero" id="dias"></p>Dias
                </li>
                <li>
                    <p class="numero" id="horas"></p>Horas
                </li>
                <li>
                    <p class="numero" id="minutos"></p>Minutos
                </li>
                <li>
                    <p class="numero" id="segundos"></p>Segundos
                </li>
            </ul>
        </div>
    </section>

    <script src="js/mapa.js"></script>

    <?php include_once 'includes\templates\footer.php'; ?>

  