<?php  session_start();

require('../inc/clases2.php');

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Firmas </title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <header></header>
    <main class="row expanded">
      <div class="column medium-2">
        <?php include("menu.php") ?>
      </div>
        <div class="column medium-10">

          <?php

            $firma = new Firmas();

            $array= $firma->desplegarFirmas();

            echo "<table>
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Firmado</th>
                          </tr>
                        </thead>
                      ";

            foreach ($array as $valor) {
              if($valor['firmado'] == 0 ){

                $firmado = "<i class='fi-x firma_no'></i>";

              }
              else{

                $firmado = "<i class='fi-checkbox firma_ok'></i>";

              }
                  echo "<tbody>
                          <tr>
                            <td>".$valor['nombre']."</td>
                            <td><a href='mailto:".$valor['usuario']."'>".$valor['usuario']."</a></td>
                            <td>".$firmado."</td>
                          </tr>";

            }
                echo "</tbody>
                </table>";

           ?>

        </div>

      </div>
    </main>
  </body>
</html>
