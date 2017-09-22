<?php session_start();
$id = $_GET['id'];
require("../inc/clases.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edición Conferencias</title>
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
        <div class="">
          <?php
// $conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
$conexion = new Conexion("localhost", "root", "", "sip2018");
$sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
FROM usuarios  AS a
LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
WHERE id_usuario = '$id' ";
$resultado = $conexion->consultar($sql);
while ($fila = mysqli_fetch_array($resultado)) {
  echo '<div id="formularioUsuarios">
    <form class="" action="actualizarUsuario.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <fieldset>
      <div class="row">
        <div class="column medium-8">
          <legend><h5>Información del ponente</h5></legend>
        </div>
      </div>
          <div class="row ">
            <div class="column medium-8">
              <label for="">Nombre Completo:</label>
              <input type="text" name="nombre" value="'.$fila['0'].'" placeholder="Nombres y Apellidos" required>
            </div>
          </div>
          <div class="row ">
            <div class="column medium-4">
              <label for="">Cargo:</label>
              <input type="text" name="cargo" value="'.$fila['cargo'].'" placeholder="Cargo" required>
            </div>
            <div class="column medium-4">
              <label for="">Empresa:</label>
              <input type="text" name="empresa" value="'.$fila['empresa'].'" placeholder="Empresa" required>
            </div>
          </div>
          <div class="row ">
            <div class="column medium-8">
              <label for="">Biografía:</label>
              <textarea name="biografia" rows="4" cols="1" value="'.$fila['biografia'].'">'.$fila['biografia'].'</textarea>
            </div>
          </div>
          <div class="row">
            <div class="column medium-3">
              <label>Conferencía:
                <select name="conferencia">
                <option value="'.$fila['id_conferencia'].'">'.$fila['nombre'].'</option>
                ';
                 $sql = "SELECT * FROM conferencias ";
                        $resultado = $conexion->consultar($sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo '<option value="'.$fila['id_conferencia'].'" >'.$fila['nombre'].'</option>';
                        }
                        echo '
                </select>
              </label>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="column">
              <input type="submit" name="" value="Actualizar" class="success button">
            </div>
          </div>
      </fieldset>
    </form>
  </div>';
}


 ?>
