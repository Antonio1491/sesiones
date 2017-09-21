<?php
$id = $_GET['id'];
$tabla = $_GET['tabla'];
$columna = $_GET['columna'];
require("../inc/clases.php");
$conexion = new Conexion("localhost", "root", "", "sip2018");
$conexion->eliminarRegistro($tabla, $columna, $id);
 ?>
