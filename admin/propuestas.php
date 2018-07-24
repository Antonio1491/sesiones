<?php include('../inc/clases2.php');

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>

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
          $formateo = '%A %d %B %Y ';
          setlocale(LC_ALL, "es_ES");
          $mex = strftime($formateo)
         ?>
         <br>
        <p>Propuestas registradas al <?php echo $mex; ?></p>
        <?php
        $propuestas = new MostrarConferencia();

        $array_propuestas = $propuestas->listaPropuestas();

        echo "<table class='tabla_propuestas'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre de la Propuesta</th>
                    <th> Nombre del Autor</th>
                    <th>Localidad</th>";
                    $i=0;
        foreach ($array_propuestas as $valor) {
          $i += 1;
          echo $x ="<tr id='".$valor['id_conferencia']."'>
                    <td>".$i."</td>
                    <td><a href='descripcionSesion.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>
                    <td>".$valor['nombre']." ".$valor['apellidos']."</td>
                    <td>".$valor['localidad']."</td>
                  </tr> ";

        }

        echo"</table>";


         ?>
      </section>
    </main>
    <footer></footer>
  </body>
</html>
