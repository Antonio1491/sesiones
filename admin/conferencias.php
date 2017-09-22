<?php session_start();
require("../inc/clases.php");
$conexion = new Conexion("localhost", "root", "", "sip2018");
// $conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Conferencias</title>
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
      <div class="column medium-10 contenido">
        <div class="row">
          <div class="column ">
            <button type="button" name="button" id="agregar" class="button"><i class="fi-plus"></i> Agregar Conferencia</button>
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
              <div class="row">
                <div class="column medium-2">
                  <label for="">Fecha (00/00/0000):</label>
                  <input type="date" name="fecha" value="" placeholder="Día/Mes/Año">
                </div>
                <div class="column medium-2">
                  <label for="">Hora:</label>
                  <input type="time" name="hora" value="" placeholder="00:00">
                </div>
                <div class="column medium-4">
                  <label for="">Lugar:</label>
                  <input type="text" name="lugar" value="">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label>Tema:
                    <select name="tema">
                      <?php $sql = "SELECT * FROM temas";
                            $resultado = $conexion->consultar($sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                              echo "<option value='".$fila['id_tema']."'>".$fila['nombre']."</option>";
                            }
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
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>
        <div class="row" id="listaConferencias">
          <div class="column medium-12">
            <?php
              $sql = "SELECT * FROM conferencias WHERE id_conferencia > 0 ";
              $resultado = $conexion->consultar($sql);
              echo "<table>
                      <thead>
                        <tr>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>";
                      while ($fila = mysqli_fetch_array($resultado)) {
                        echo "
                        <tr>
                          <td>" .$fila['nombre']. "</td>
                          <td><a href='editarConferencia.php?id=".$fila['id_conferencia']."' title='Editar'><i class='fi-pencil'></i></a></td>
                          <td><a href='eliminar.php?id=".$fila['id_conferencia']."&tabla=conferencias&columna=id_conferencia' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
                          </tr>";
                        }
                      echo "
                      </tbody>
                    </table>";
             ?>
          </div>
        </div>
      </div>
    </main>

  </body>
</html>
