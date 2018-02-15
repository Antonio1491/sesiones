<?php session_start();

  require("../inc/datos_conexion.php");

  $nombre = $_POST['nombre'];

  $cargo = $_POST['cargo'];

  $empresa = $_POST['empresa'];

  $biografia = $_POST['biografia'];


  $sql = "UPDATE usuarios SET nombre = '$nombre', cargo = '$cargo',
  empresa = '$empresa', biografia = '$biografia'
  WHERE id_usuario = ".$_SESSION["id_usuario"]." ";

  $resultado = $conexion -> actualizar($sql);

 ?>
