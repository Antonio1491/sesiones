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
$cargo_ing = $_POST['cargo_ing'];
$empresa = $_POST['empresa'];
$empresa_ing = $_POST['empresa_ing'];
$biografia = addslashes($_POST['biografia']);
$biografia_ing = addslashes($_POST['biografia_ing']);
$conferencia = $_POST['conferencia'];
$prioridad = $_POST['prioridad'];

$nivel = 2;

$fotografia = $_FILES['fotografia']['name'];
$extraerNombre = $_FILES['fotografia']['tmp_name'];
$destino = "../img/conferencistas/".$fotografia ;
copy($extraerNombre, $destino);

$insertar = new RegistrarUsuario();

$resultado = $insertar->registroDeUsuario($nombre, $cargo, $cargo_ing, $empresa,
                                          $empresa_ing, $biografia, $biografia_ing, $fotografia,
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
