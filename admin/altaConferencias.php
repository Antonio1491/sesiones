<?php session_start();
require('../inc/clases.php');

$conferencia = $_POST['conferencia'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$tema = $_POST['tema'];
$descripcion = $_POST['descripcion'];

// $conexion = new Conexion("localhost", "root", "", "sip2018");
$conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
$sql = "INSERT INTO conferencias VALUES (null, '$conferencia', '$fecha', '$hora', '$lugar', '$descripcion', '$tema')";
$conexion->insertarDatos($sql);




 ?>
