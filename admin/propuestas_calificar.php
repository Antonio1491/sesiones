<?php session_start();
$_SESSION['id_usuario'] = $_GET['id'];

include('../inc/clases2.php');

$propuestas = new MostrarConferencia();
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Propuestas a calificar</title>

    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation.min.css">

    <script  src="../js/foundation.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/what-input.js"></script>
    <script>
     $(document).foundation();
   </script>
  </head>
  <body>
    <header> <h4>Control de Sesiones Educativas</h4></header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("menu.php") ?>
      </div>
      <section class="column medium-10">
        <?php

        $listaCalificar = new Comite();

        $propuestasCalificar = $listaCalificar->sesionesAsignadas($_SESSION['id_usuario']);

        echo "<table class='tabla_propuestas'>
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Nombre de la Propuesta</th>
                    <th>Enlace Encuesta</th>
                    ";
                    // $i=0;
        foreach (  $propuestasCalificar as $valor) {
          // $i += 1;
          echo "<tr id='".$valor['id_conferencia']."'>
                    <td>".$valor['id_conferencia']."</td>";
          echo "    <td><a href='descripcionSesion.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>
                    <td><a href='".$valor['enlaceEncuesta']."' class='enlace_encuesta'>Ir a la encuesta</a></td>

                </tr> ";
          }
          echo"</table>";
         ?>


      </section>
    </main>
    <footer></footer>
  </body>
</html>
