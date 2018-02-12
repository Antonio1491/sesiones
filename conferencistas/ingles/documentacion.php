<?php session_start();

require('../../inc/clases2.php');

$id_usuario = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentación</title>
    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../css/app-conferencistas.css">
    <link rel="stylesheet" href="../../font/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../../js/app.js"></script>
  </head>
  <body>
    <header><h3 class="text-center">1er Congreso Internacional de Parques Urbanos 2018</h3></header>
    <main>
      <div class="row collapse expanded">
        <div class="column medium-2">
          <?php include("menu.php"); ?>
        </div>
        <div class="column medium-10">
          <div class="row">
            <div class="column medium-12">
              <h5>DOCUMENTS </h5>
              <p>In this section you can upload the audiovisual material that you will use in your keynote or educational session.</p>
              <p>It is necessary that you upload all the files you will use in your presentation before or not later than FRIDAY,
                MARCH 30, 2018, since your presentation will be preloaded in the computer of your assigned room. It
                is not necessary to bring a FLASH memory on the day of presentation.</p>
                <strong>Formats and recommendations:</strong>
                <ul>
                  <li>Only Power Point presentations (.pptx) will be accepted</li>
                  <li>Display 16: 9</li>
                  <li>Recommended font size 18 or larger</li>
                  <strong>Formats and recommendations for video:</strong>
                  <li>If you will use videos in your presentation, it is necessary to attach them in this platform,
                    these will also be preloaded in the computer of your assigned room.</li>
                    <li>Formats required: .MP4 or .MOV</li>
                    <li>IMPORTANT: If your video is on YouTube, please send the link.</li>
                </ul>
            </div>

          </div>

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
                      <label for="">Link video: </label>
                      <input type="text" name="link" value="">
                    </div>
                  </div>

                  <button type="submit" name="" value="Subir Archivos" class="button ">Upload files <i class="fi-upload"></i></button>
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
