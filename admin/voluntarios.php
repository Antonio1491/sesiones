<?php session_start();
require("../inc/clases2.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Voluntarios</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
  </head>
  <body>
    <header></header>
    <main class="row expanded">
      <div class="column medium-2">
        <?php include("menu.php") ?>
      </div>

      <div class="row" id="listaConferencias">
        <?php
          $voluntarios = new Voluntarios();
          $respuesta = $voluntarios->listaVoluntarios();
            echo "<table>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Universidad</th>
                      </tr>
                    </thead>
                    <tbody>";

                    foreach ($respuesta as $valor) {
                        echo
                        "<tr>
                          <td>" .$valor['nombre']. "</td>
                          <td>" .$valor['apellido_paterno']. "</td>
                          <td>" .$valor['email']. "</td>
                          <td>" .$valor['universidad']. "</td>
                        </tr>";
                      }
                    echo "
                    </tbody>
                  </table>";
           ?>

      </div>
    </div>

    </main>

    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/what-input.js" type="text/javascript"></script>
    <script src="../js/foundation.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
