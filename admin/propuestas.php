<?php include('../inc/clases2.php');
$propuestas = new MostrarConferencia();
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation.min.css">
  </head>
  <body>
    <header>
      <h4>Control de Sesiones Educativas</h4>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("menu.php") ?>
      </div>
      <section class="column medium-10">
        <?php
          $formateo = '%A %d %B %Y ';
          setlocale(LC_ALL, "es_ES");
          $mex = strftime($formateo);
          $total_propuestas = $propuestas->totalPropuestas(); echo "<br><p>". $total_propuestas. " propuestas registradas</p>";

          $array_propuestas = $propuestas->listaPropuestas();

          echo "<table class='tabla_propuestas'>
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Nombre de la Propuesta</th>
                    <th> Nombre del Autor</th>
                    <th>Localidad</th>
                    <th>Enlace</th>
                    <th>Aceptada</th>";
                    $i=0;
                    foreach ($array_propuestas as $valor) {
                      $i += 1;
                      echo $x ="<tr id='".$valor['id_conferencia']."'>
                        <td>".$valor['id_conferencia']."</td>
                        <td><a href='descripcionSesion.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>
                        <td>".$valor['nombre']." ".$valor['apellidos']."</td>
                        <td>".$valor['localidad']."</td>
                        <td><a href='".$valor['enlaceEncuesta']."' class='enlace_encuesta'>Ir a la encuesta</a></td>";

                        if( $valor['status'] == NULL){
                            echo "<td><a href='aceptarPropuesta.php?id=".$valor['id_conferencia']."'>Aprobar</a></td>";
                        }
                        else{
                          echo "<td class='aceptada'>Aceptada</a></td>";
                        }

                      echo "</tr> ";

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
