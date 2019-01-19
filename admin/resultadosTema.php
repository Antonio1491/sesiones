<?php include('../inc/clases2.php');
$tema = $_GET["tema"];
$propuestas = new Comite();
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Resultados</title>

    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation.min.css">
  </head>
  <body>
    <header> <h4>Control de Sesiones Educativas</h4></header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("menu.php") ?>
      </div>
      <section class="column medium-10">
      <br>
      <div class="row column">
        <h3 class="titulo_tematicas">Tema: <?php
            $nombre = $propuestas->nombreTematica($tema);
            echo $nombre ?></h3>
      </div>
      <?php

        $array_propuestas = $propuestas->seleccionarTema($tema);

        echo "<table class='tabla_propuestas'>
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Nombre de la Propuesta</th>

                    <th> Nombre del Autor</th>
                    <th>Localidad</th>
                    <th>Enlace</th>";
                    $i=0;
        foreach ($array_propuestas as $valor) {
          $i += 1;
          echo $x ="<tr id='".$valor['id_conferencia']."'>
                    <td>".$valor['id_conferencia']."</td>";

               echo"<td><a href='descripcionSesion.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>

                    <td>".$valor['nombre']." ".$valor['apellidos']."</td>
                    <td>".$valor['localidad']."</td>
                    <td><a href='".$valor['enlaceEncuesta']."' class='enlace_encuesta'>Ir a la encuesta</a></td>
                  </tr> ";

        }

        echo"</table>";


         ?>
      </section>
    </main>
    <footer></footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/what-input.js" type="text/javascript"></script>
    <script src="../js/foundation.min.js" type="text/javascript"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
