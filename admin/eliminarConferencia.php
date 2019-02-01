<?php
$id = $_GET['id'];

require("../inc/clases2.php");

$eliminar = new EliminarRegistro();

$resultado = $eliminar->eliminarConferencia($id);

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
