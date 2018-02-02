<?php  session_start();

require('../inc/clases2.php');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Conferencia </title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-conferencistas.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <header><h3 class="text-center">1er Congreso Internacional de Parques Urbanos 2018</h3></header>
    <main>
      <div class="row collapse expanded">
        <div class="column medium-2">
          <?php include("menu.php"); ?>
        </div>
        <div class="column medium-10">
          <div class="datos_conferencia">
            <?php

              $datos_conferencia = new Conferencista();

              $array_datos = $datos_conferencia->datosConferencia($_SESSION['id_usuario']);

              foreach ($array_datos as $datos) {

                echo "<div class='column medium-6 '>
                        <span>Nombre de la Conferencia: </span>".$datos['nombre_conferencia']."
                      </div>
                      <div class='column'>
                        <span>Fecha de participación: </span>".$datos['fecha']."
                      </div>
                      <div class='column '>
                        <span>Hora inicio: </span>".$datos['hora']."
                      </div>
                      <div class='column '>
                        <span>Hora fin: </span>".$datos['hora_fin']."
                      </div>
                      <div class='column '>
                        <span>Salón: </span>".$datos['lugar']."
                      </div>
                      <div class='column medium-6 '>
                        <span>Descripción: </span>".$datos['descripcion']."
                      </div>
                      <div class='column '>
                        <span>Tema al que pertenece: </span>".$datos['nombre']."
                      </div>";
              }
             ?>
          </div>
        </div>
      </div>
    </main>

  </body>
</html>
