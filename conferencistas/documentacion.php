<?php session_start();

require('../inc/clases2.php');

$id_usuario = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentación</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-conferencistas.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
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

          <?php

            $comprobar_documentos = new Conferencista();

            $respuesta = $comprobar_documentos->comprobarDocumentos($id_usuario);

            if ($respuesta == true) {

              $mensaje = "<div class='row carga-doc'><div class='column medium-12'><h4 >¡Archivos cargados!</h4></div></div>
                          <div class='row'><img src='../img/check-documentos.png' class='check_doc'></div>";

              echo $mensaje;
            }
            else {

              echo'
              <section id="form-portafolio">
              <h4>Material de Exposición</h4>
                <form class="" action="cargarDocumentos.php" method="post" enctype="multipart/form-data">

                  <div class="row">
                    <div class="column medium-4">
                      <label for="exampleFileUpload" class="">1.- Seleccionar Presentación</label>
                      <input type="file" name="presentacion" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="column medium-4">
                      <label for="exampleFileUpload" >2.- Seleccionar Video</label>
                      <input type="file" name="video" >
                    </div>

                  </div>
                  <div class="row">
                    <div class="column medium-4">
                      <label for="">Link de video: </label>
                      <input type="text" name="link" value="">
                    </div>
                  </div>

                  <button type="submit" name="" value="Subir Archivos" class="button ">Cargar Archivos <i class="fi-upload"></i></button>
                </form>
              </section>';

            }

           ?>




        </div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>
