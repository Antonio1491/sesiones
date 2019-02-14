<?php
$id = $_GET['id'];
$tabla = $_GET['tabla'];

require("../inc/clases2.php");

$eliminar = new EliminarRegistro();

$resultado = $eliminar->eliminar($id, $tabla);

if ($resultado) {

      $mensaje = header("Location:". getenv('HTTP_REFERER'));

      echo $mensaje;

}

else{

      echo"<script language='JavaScript'>
      alert('No pudimos eliminar el registro');
      </script>";
      echo "<script>window.history.go(-1);</script>";

}

 ?>
