<?php session_start();

require("../inc/clases2.php");

$firma = $_POST['firma'];

$agregar_firma = new Conferencista();

$respuesta = $agregar_firma->firmar($_SESSION['id_usuario']);

if ($respuesta) {

  $mensaje = header("Location: acuerdos.php");

  echo $mensaje;

}

else{

  echo"<script language='JavaScript'>
        alert('Error: No pudimos actualizar');
        </script>";
  echo "<script>window.history.go(-1);</script>";

}

?>
