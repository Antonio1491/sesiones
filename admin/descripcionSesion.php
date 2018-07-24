<?php
include('../inc/clases2.php');
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Propuesta Registrada</title>

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
          $datos = new MostrarConferencia();
          $array_descripcion = $datos->descripcionPropuesta($id);

          foreach ($array_descripcion as $valor) {

        ?>
        <section class="content_propuesta">
          <div class="row info_propuesta">
            <?php
            echo "<h5>".$valor['conferencia']."</h5>";
            ?>
          </div>
          <div class="row info_propuesta">
            <?php
            echo "<span>Modalidad: </span>".$valor['Modalidad']."<span class='tema_propuesta'>Tema: </span>".$valor['id_tema'];
            ?>
          </div>
          <div class="row info_propuesta">
            <?php
            echo "<div class='descripcion_propuesta'><span>Descripción: </span>".$valor['descripcion']."</div>";
            echo "<div class='descripcion_propuesta'><span>Justificación:</span> ".$valor['justificacion']."</div>";
            echo "<div class='descripcion_propuesta'><span>Objetivos:</span> ".$valor['objetivos']."</div>";
            echo "<div class='descripcion_propuesta'><span> Adicionales:</span> ".$valor['adicionales']."</div>";
            ?>
          </div>
        </section>

        <div class="row info_propuesta datos_conferencista">
          <div class="column medium-4">
            <?php
              echo "<img src='http://congresoparques.com/registro/fotos/".$valor['foto']."'>";
            ?>
          </div>
          <div class="column medium-8">
            <?php
              echo "<div><span>Nombre: </span> ".$valor['nombre']." ".$valor['apellidos']."</div>";
              echo "<div><span>Email: </span> ".$valor['email'];
              echo "<div><span>Email Asistente: </span> ".$valor['email2'];
              echo "<div><span>Cargo: </span> ".$valor['cargo'];
              echo "<div><span>Empresa: </span> ".$valor['empresa'];
              echo "<div><span>Localidad: </span> ".$valor['localidad'];
              echo "<div><span>Experiencia: </span> ".$valor['experiencia'];
            ?>
          </div>
        </div>
        <?php } ?>
      </section>
    </main>
    <footer></footer>
  </body>
</html>
