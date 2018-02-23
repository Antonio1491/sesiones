<?php session_start();

$id = $_GET['id'];

require("../inc/clases2.php");

$conferencia = $_POST['conferencia'];
$conferencia_ing = $_POST['conferencia_ing'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$hora_fin = $_POST['hora_fin'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$descripcion_ing = $_POST['descripcion_ing'];
$tema = $_POST['tema'];

$actualizar = new ActualizarConferencia();

$resultado = $actualizar->actualizar($conferencia, $conferencia_ing, $fecha, $hora,
                                    $hora_fin, $lugar, $descripcion, $descripcion_ing,
                                    $tema, $id);

  if ($resultado) {

      $mensaje = header("Location: conferencias.php");

      echo $mensaje;

      }

      else{

        echo"<script language='JavaScript'>
              alert('Error: No pudimos actualizar');
              </script>";
        echo "<script>window.history.go(-2);</script>";

      }


 ?>
