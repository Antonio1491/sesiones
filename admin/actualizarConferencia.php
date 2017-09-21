<?php session_start();
$id = $_GET['id'];
require("../inc/clases.php");

$conferencia = $_POST['conferencia'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$tema = $_POST['tema'];

 $sql = "UPDATE conferencias SET nombre = '$conferencia', fecha = '$fecha', hora = '$hora',
 lugar = '$lugar', descripcion = '$descripcion', id_tema = '$tema' WHERE id_conferencia = '$id' ";

$conexion = new Conexion("localhost", "root", "", "sip2018");
$conexion->actualizar($sql);

 ?>
