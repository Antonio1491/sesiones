<?php session_start();
require("../inc/clases.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];
$biografia = $_POST['biografia'];
$conferencia = $_POST['conferencia'];

$fotografia = $_FILES['fotografia']['name'];
$extraerNombre = $_FILES['fotografia']['tmp_name'];
$destino = "../img/conferencistas/".$fotografia ;
copy($extraerNombre, $destino);

$conexion = new Conexion("localhost", "root", "", "sip2018");
// $conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
$sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$cargo', '$empresa', '$biografia', '$fotografia', '$usuario', '$password', 2, '$conferencia')";
$conexion->insertarDatos($sql);


 ?>
