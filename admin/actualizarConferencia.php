<?php session_start();

$id = $_GET['id'];

require("../inc/clases2.php");

$conferencia = $_POST['conferencia'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$hora_fin = $_POST['hora_fin'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$tema = $_POST['tema'];

$actualizar = new ActualizarConferencia();

$resultado = $actualizar->actualizar($conferencia, $fecha, $hora,
                                    $hora_fin, $lugar, $descripcion,
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
