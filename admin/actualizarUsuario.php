<?php session_start();
$id = $_GET['id'];
require("../inc/clases.php");

$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$biografia = $_POST['biografia'];
$conferencia = $_POST['conferencia'];


$sql = "UPDATE usuarios SET nombre = '$nombre', cargo = '$cargo', empresa = '$empresa',
biografia = '$biografia', id_conferencia = '$conferencia'
WHERE id_usuario = '$id'";

$conexion = new Conexion("localhost", "root", "", "sip2018");
$conexion->actualizar($sql);

 ?>
