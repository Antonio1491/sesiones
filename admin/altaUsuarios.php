<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php session_start();
require('../inc/clases2.php');

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$biografia = nl2br($_POST['biografia']);
$conferencia = $_POST['conferencia'];
$prioridad = $_POST['prioridad'];

$nivel = 2;

$fotografia = $_FILES['fotografia']['name'];
$extraerNombre = $_FILES['fotografia']['tmp_name'];
$destino = "../img/conferencistas/".$fotografia ;
copy($extraerNombre, $destino);

$insertar = new RegistrarUsuario();

$resultado = $insertar->registroDeUsuario($nombre, $cargo, $empresa, $biografia, $fotografia,
              $usuario, $password, $nivel, $prioridad, $conferencia);

    if ($resultado) {

      $mensaje = header("Location: usuarios.php");

      echo $mensaje;

      }
    else{
      echo"<script language='JavaScript'>
          alert('Error: No pudimos realizar el registro');
          </script>";
      echo "<script>window.history.go(-1);</script>";
    }

 ?>
</html>
