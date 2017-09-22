<?php
$id = $_GET['id'];
$tabla = $_GET['tabla'];
$columna = $_GET['columna'];
require("../inc/clases.php");
// $conexion = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
$conexion = new Conexion("localhost", "root", "", "sip2018");
$conexion->eliminarRegistro($tabla, $columna, $id);
 ?>
