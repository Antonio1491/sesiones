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
          <?php $conexion = new Conexion("localhost", "root", "", "sip2018");
          $sql = "SELECT  a.nombre, a.fecha, a.hora, a.lugar, a.descripcion, a.id_tema, b.id_tema, b.nombre
          FROM conferencias AS a
          LEFT JOIN temas as b ON b.id_tema = a.id_tema
          WHERE id_conferencia = '$id' " ;
          $resultado = $conexion->consultar($sql);
          while ($fila = mysqli_fetch_array($resultado)) {
          echo '<form class="" action="actualizarConferencia.php?id='.$id.'" method="post">
              <fieldset>
                <div class="row">
                  <div class="column medium-8">
                    <legend><h5>Edición de conferencia</h5></legend>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-8">
                    <label for="">Conferencia:</label>
                    <input type="text" name="conferencia" value="'.$fila[0].'" placeholder="Nombre de la Conferencia" required>
                  </div>
                </div>
                <div class="row">
                  <div class="column medium-2">
                    <label for="">Fecha (00/00/0000):</label>
                    <input type="date" name="fecha" value="'.$fila['fecha'].'" placeholder="Día/Mes/Año">
                  </div>
                  <div class="column medium-2">
                    <label for="">Hora:</label>
                    <input type="time" name="hora" value="'.$fila['hora'].'" placeholder="00:00">
                  </div>
                  <div class="column medium-4">
                    <label for="">Lugar:</label>
                    <input type="text" name="lugar" value="'.$fila['lugar'].'">
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-8">
                    <label for="">Descripción:</label>
                    <textarea name="descripcion" rows="4" cols="1" value="'.$fila['descripcion'].'">'.$fila['descripcion'].'</textarea>
                  </div>
                </div>
                <div class="row ">
                  <div class="column medium-5">
                    <label>Tema:
                      <select name="tema">
                      <option value="'.$fila['id_tema'].'">'.$fila['nombre'].'</option>
                      ';
                         $sql = "SELECT * FROM temas";
                              $resultado = $conexion->consultar($sql);
                              while ($fila = mysqli_fetch_array($resultado)) {
                                echo "<option value='".$fila['id_tema']."'>".$fila['nombre']."</option>";
                              }
                      echo'</select>
                    </label>
                  </div>
                </div>

                <div class="row ">
                  <input type="submit" name="" value="Actualizar" class="button success">
                </div>
              </fieldset>
            </form>
        </div>';
}
 ?>
