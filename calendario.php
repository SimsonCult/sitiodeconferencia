
<?php include_once 'includes\templates\header.php'; ?>
<!-- <pre>
    <php  var_dump($eventos);  ?>
</pre> -->


<section class="seccion contenedor">
    <h2>Calendario de eventos</h2>
    <?php
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono , nombre_invitado, apellido_invitado ';
            $sql .= ' FROM eventos ';
            $sql .= ' INNER JOIN categoria_evento ';
            $sql .= ' ON eventos.id_cat_evento = categoria_evento.id_categoria ';
            $sql .= ' INNER JOIN invitados ';
            $sql .= ' ON eventos.id_inv = invitados.invitado_id ';
            $sql .= ' ORDER BY evento_id  ';

            $resultado = $conn->query($sql);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    ?>
    <div class=" calendario clearflix">
        <?php
            $calendario = array();

            while($eventos = $resultado->fetch_assoc()){  
            
                //obtiene la fecha del evento
                //usamos la variable fecha como indice para el array de calendario ... nombrandolo como primer lugar del array 
                //agruando los valores por fecha o por otro objetivo que tengamos

                $fecha =  $eventos['fecha_evento'];

                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => 'fa' . ' ' . $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . ' ' .$eventos['apellido_invitado']
                );
                $calendario[$fecha][] = $evento;
                
                ?>
                
        <?php }  ?> <!-- Donde termina el while -->
        <?php
            //imprime todos los eventos
            foreach ($calendario as $dia => $lista_eventos){?>
                <h3>
                    <i class="fas fa-calendar-alt"></i>
                    <?php 
                        setlocale (LC_TIME, 'spanish');
                        echo  strftime('%A, %d de %B del %Y',strtotime($dia));
                     ?>
                </h3>

                <?php 
                    foreach ($lista_eventos as $evento) {?>
                        <div class="dia clearfix">
                            <p class="titulo"> <?php echo $evento['titulo']; ?> </p>
                            <p class="hora">
                                <i class="fa fa-clock" aria-hidden="true"></i>
                                 <?php echo $evento['fecha'] . ' a las ' .$evento['hora']; ?> 
                            </p>
                            <p class="categoria">
                                <i class="<?php echo $evento['icono']; ?>"></i>
                                 <?php echo $evento['categoria']; ?> 
                            </p>
                            <p class="invitado">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                 <?php echo $evento['invitado']; ?> 
                            </p>
                        </div>
                
                    <?php } ?> <!-- Fin del foreach eventos--> 

            <?php } ?> <!-- Fin del foreach calendario--> 

           

    </div>

    <?php  $conn->close();    ?> <!-- cerramos la conexion-->
</section>

<?php include_once 'includes\templates\footer.php'; ?>
