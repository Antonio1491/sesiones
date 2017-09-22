<?php session_start();
require("../inc/clases.php");
// $conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
$conexion = new Conexion("localhost", "root", "", "sip2018");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <header>
      <div class="row">
        <div class="column">

        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="column medium-2">
        <?php include("menu.php") ?>
      </div>
      <div class="column medium-10 contenido">
        <div class="row">
          <div class="column ">
            <button type="button" name="button" id="agregar" class="button"><i class="fi-plus"></i> Agregar Usuario</button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaUsuarios.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Información del ponente</h5></legend>
                </div>
              </div>
                <div class="row ">
                  <div class="column medium-4">
                    <label for="">Usuario:</label>
                    <input type="text" name="usuario" value="" placeholder="E-mail" required>
                  </div>
                  <div class="column medium-4">
                    <label for="">Password:</label>
                    <input type="text" name="password" value="" placeholder="Password" required>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-8">
                    <label for="">Nombre Completo:</label>
                    <input type="text" name="nombre" value="" placeholder="Nombres y Apellidos" required>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-4">
                    <label for="">Cargo:</label>
                    <input type="text" name="cargo" value="" placeholder="Cargo" required>
                  </div>
                  <div class="column medium-4">
                    <label for="">Empresa:</label>
                    <input type="text" name="empresa" value="" placeholder="Empresa" required>
                  </div>
                </div>
                <div class="row">
                  <div class="column medium-6">
                    <label>Conferencía:
                      <select name="conferencia">
                        <?php $sql = "SELECT * FROM conferencias";
                              $resultado = $conexion->consultar($sql);
                              while ($fila = mysqli_fetch_array($resultado)) {
                                echo "<option value='".$fila['id_conferencia']."'>".$fila['nombre']."</option>";
                              }
                        ?>
                      </select>
                    </label>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-8">
                    <label for="">Fotografía:</label>
                    <input type="file" name="fotografia" value="" required>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-8">
                    <label for="">Biografía:</label>
                    <textarea name="biografia" rows="4" cols="1" required></textarea>
                  </div>
                </div>
                <div class="row ">
                  <div class="column">
                    <input type="submit" name="" value="Registrar" class="success button">
                  </div>
                </div>
            </fieldset>
          </form>
        </div>
        <div id="listaUsuarios" class="row ">
          <div class="column medium-8">
            <?php
              $sql = "SELECT * FROM usuarios WHERE nivel = 2 ";
              $resultado = $conexion->consultar($sql);
              echo "<table>
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Usuario</th>
                        </tr>
                      </thead>
                      <tbody>";
                      while ($fila = mysqli_fetch_array($resultado)) {
                        echo "
                        <tr>
                          <td>" .$fila['nombre']. "</td>
                          <td>" .$fila['usuario']. "<td>
                          <td><a href='editarUsuario.php?id=".$fila['id_usuario']."' title='Editar'><i class='fi-pencil'></i></a></td>
                          <td><a href='eliminar.php?id=".$fila['id_usuario']."&tabla=usuarios&columna=id_usuario' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    <footer></footer>
  </body>
</html>
