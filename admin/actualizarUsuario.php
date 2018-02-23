<?php session_start();
$id = $_GET['id'];
require("../inc/clases2.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$cargo_ing = $_POST['cargo_ing'];
$empresa = $_POST['empresa'];
$empresa_ing = $_POST['empresa_ing'];
$biografia = addslashes($_POST['biografia']);
$biografia_ing = addslashes($_POST['biografia_ing']);
$conferencia = $_POST['conferencia'];

$actualizar = new ActualizarUsuario();
// echo $nombre, $cargo, $cargo_ing, $empresa, $empresa_ing,
                                // $biografia, $biografia_ing, $usuario, $conferencia, $id;
$resultado = $actualizar->actualizar($nombre, $cargo, $cargo_ing, $empresa, $empresa_ing,
                                $biografia, $biografia_ing, $usuario, $conferencia, $id);

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
