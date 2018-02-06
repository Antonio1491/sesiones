<?php session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php
require("../inc/clases2.php");
$id = $_GET['id'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$biografia = $_POST['biografia'];
$conferencia = $_POST['conferencia'];

$actualizar = new ActualizarUsuario();

$resultado = $actualizar->actualizar($nombre, $cargo, $empresa, $biografia, $usuario, $conferencia, $id);

if ($resultado) {

          $mensaje = header("Location: usuarios.php");

          echo $mensaje;
    }
    else{
    echo"<script language='JavaScript'>
    alert('Error: No pudimos actualizar');
    </script>";
    echo "<script>window.history.go(-2);</script>";
    }

?>
</html>
