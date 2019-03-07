<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php session_start();
$id = $_GET['id'];
require("../inc/clases2.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$cargo_ing = $_POST['cargo_ing'];
$empresa = $_POST['empresa'];
$empresa_ing = $_POST['empresa_ing'];
$localidad = $_POST['localidad'];
$biografia = addslashes($_POST['biografia']);
$biografia_ing = addslashes($_POST['biografia_ing']);
$conferencia = $_POST['conferencia'];

$actualizar = new ActualizarUsuario();
// echo $nombre, $cargo, $cargo_ing, $empresa, $empresa_ing,
                                // $biografia, $biografia_ing, $usuario, $conferencia, $id;
$resultado = $actualizar->actualizar($nombre, $cargo, $cargo_ing, $empresa, $empresa_ing,
                                $biografia, $biografia_ing, $localidad, $usuario, $conferencia, $id);

if ($resultado) {

          $mensaje = "<script>window.history.go(-2);</script>";

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
