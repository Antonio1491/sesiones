<?php session_start();
$id = $_GET['id'];
require("../inc/clases2.php");
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

            $traer_datos = new DatosConferencia();

            $resultado = $traer_datos->mostrarConferencia($id);

            foreach ($resultado as $valor) {

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
                        <input type="text" name="conferencia" value="'.$valor['nombre_conferencia'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Conferencia:</label>
                        <input type="text" name="conferencia_ing" value="'.$valor['nombre_conferencia_ing'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-2">
                        <label for="">Fecha (00/00/0000):</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Día/Mes/Año">
                      </div>
                      <div class="column medium-2">
                        <label for="">Hora:</label>
                        <input type="time" name="hora" value="'.$valor['hora'].'" placeholder="00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Hora Fin:</label>
                        <input type="time" name="hora_fin" value="'.$valor['hora_fin'].'" placeholder="00:00:00">
                      </div>
                    </div>
                    <div class="row ">
                    <div class="column medium-4">
                      <label for="">Lugar:</label>
                      <input type="text" name="lugar" value="'.$valor['lugar'].'">
                    </div>
                    <div class="column medium-4">
                      <label>Tema:
                        <select name="tema">
                        <option value="'.$valor['id_tema'].'">'.$valor['nombre'].'</option>
                        ';
                          $desplegar_temas = new ListaTemas();

                          $resultado = $desplegar_temas->desplegarTemas();

                          foreach ($resultado as $value) {

                                echo "<option value='".$value['id_tema']."'>".$value['nombre']."</option>";

                                }
                        echo'</select>
                      </label>
                    </div>
                  </div>


                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción:</label>
                      <textarea name="descripcion" rows="4" cols="1" value="'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                    </div>
                    </div>

                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción:</label>
                      <textarea name="descripcion_ing" rows="4" cols="1" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
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
