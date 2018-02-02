<?php session_start();

require('../inc/clases2.php');

$conferencia = $_POST['conferencia'];

$fecha = $_POST['fecha'];

$hora = $_POST['hora'];

$hora_fin = $_POST['hora_fin'];

$lugar = $_POST['lugar'];

$tema = $_POST['tema'];

$descripcion = $_POST['descripcion'];

$registro = new RegistroConferencia();

$resultado = $registro->registrar($conferencia, $fecha, $hora, $hora_fin, $lugar, $descripcion, $tema);

if ($resultado) {

  $mensaje = header("Location: conferencias.php");

  echo $mensaje;

  }
else{
  echo"<script language='JavaScript'>
      alert('Error: No pudimos realizar el registro');
      </script>";
  echo "<script>window.history.go(-1);</script>";
}


// $sql = "INSERT INTO conferencias VALUES (null, '$conferencia', '$fecha', '$hora', '$hora_fin', '$lugar',
//   '$descripcion', '$tema' )";
// $conexion->insertarDatos($sql);

 ?>
