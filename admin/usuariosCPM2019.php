<?php
// session_start();

require('../inc/clases2.php');
// require('../inc/devuelveUsuarios.php');

// Crear una instancia para que se ejecute el constructor de la clase
$usuarios = new DevuelveUsuarios();
$evento = "CPM2019";
$array_usuarios = $usuarios->get_usuarios($evento);
$conferencias = new MostrarConferencia();
$array_conferencias = $conferencias->listaConferencias($evento);

// require("../inc/datos_conexion.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script> -->

  </head>
  <body>
    <header><h4>Control de Sesiones Educativas</h4></header>
    <main class="row expanded">
      <div class="column medium-2">
        <?php include("menu.php") ?>
      </div>
      <div class="column medium-10 contenido">
        <div class="formularioRegistro">
          <div class="row">
            <div class="column ">
              <button type="button" name="button" id="agregar" class="button">
                <i class="fi-plus"></i> Agregar Usuario
              </button>
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
                   <div class="column medium-3">
                      <label for="">Usuario:</label>
                      <input type="text" name="usuario" value="" placeholder="E-mail" required>
                   </div>
                   <div class="column medium-3">
                      <label for="">Password:</label>
                      <input type="text" name="password" value="" placeholder="Password" required>
                   </div>
                   <div class="column medium-2">
                      <label for="">Nivel de prioridad:</label>
                      <select class="" name="prioridad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
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
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Position:</label>
                      <input type="text" name="cargo_ing" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Company:</label>
                      <input type="text" name="empresa_ing" value="" placeholder="Empresa" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="column medium-6">
                      <label>Conferencía:
                        <select name="conferencia">
                          <?php
                            foreach ($array_conferencias as $valor) {
                            echo "<option value='".$valor['id_conferencia']."'>".$valor['nombre_conferencia']."</option>";
                            }
                          ?>
                        </select>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="column medium-8">
                      <label for="">Localidad:</label>
                      <input type="text" name="localidad" value="" placeholder="País, Ciudad" required>
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
                    <div class="column medium-8">
                      <label for="">Biography:</label>
                      <textarea name="biografia_ing" rows="4" cols="1" required></textarea>
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
        </div>

        <div class="row">
          <?php
            echo "<table>
                    <thead>
                      <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Empresa</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>";
                      foreach ($array_usuarios as $elemento) {
                        echo "<tr><td>" . $elemento['usuario'] . "</td>";
                        echo "<td>" . $elemento['nombre'] . "</td>";
                        echo "<td>" . $elemento['cargo'] . "</td>";
                        echo "<td>" . $elemento['empresa'] . "</td>";
                        echo "<td><a href='editarUsuario.php?id=".$elemento['id_usuario']."' title='Editar'><i class='fi-pencil'></i></a></td>";
                        echo "<td><a href='eliminar.php?id=".$elemento['id_usuario']."&tabla=usuarios' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>";
                        }
                        echo "</tbody>
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
