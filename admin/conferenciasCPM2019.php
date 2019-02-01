<?php session_start();

require("../inc/clases2.php");

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Conferencias</title>
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

      <div class="column medium-10 contenido">
        <div class="row">
          <div class="column ">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Conferencia
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaConferencias.php" method="post">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Conferencias</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Conferencia:</label>
                  <input type="text" name="conferencia" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Conference:</label>
                  <input type="text" name="conferencia_ing" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row">
                <div class="column medium-2">
                  <label for="">Fecha (00/00/0000):</label>
                  <input type="date" name="fecha" value="" placeholder="Día/Mes/Año">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="hora" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="hora_fin" value="" placeholder="00:00:00">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Lugar:</label>
                  <input type="text" name="lugar" value="">
                </div>
                <div class="column medium-4">
                  <label>Tema:
                    <select name="tema">
                      <?php
                          $lista_de_temas = new ListaTemas();

                          $lista = $lista_de_temas->desplegarTemas();

                          foreach ($lista as $valor) {

                            echo "<option value='".$valor['id_tema']."'>".$valor['nombre']."</option>";

                          }
                            // $sql = "SELECT * FROM temas";
                            // $resultado = $conexion->consultar($sql);
                            // while ($fila = mysqli_fetch_array($resultado)) {
                            //   echo "<option value='".$fila['id_tema']."'>".$fila['nombre']."</option>";
                            // }
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descripción:</label>
                  <textarea name="descripcion" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Description:</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="row" id="listaConferencias">
          <?php
              $lista_conferencias = new MostrarConferencia();
              $evento = "CPM2019";
              $respuesta = $lista_conferencias->listaConferencias($evento);

            echo "<table>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Lugar</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>";

                    foreach ($respuesta as $valor) {
                        echo "<tr>
                        <td>" .$valor['nombre_conferencia']. "</td>
                        <td>" .$valor['hora']. "</td>
                        <td>" .$valor['hora_fin']. "</td>
                        <td>" .$valor['lugar']. "</td>
                        <td><a href='editarConferencia.php?id=".$valor['id_conferencia']."' title='Editar'><i class='fi-pencil'></i></a></td>
                        <td><a href='eliminarConferencia.php?id=".$valor['id_conferencia']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
