<?php
include('../inc/clases2.php');
$propuestas = new MostrarConferencia();

$id_propuesta = $_GET['id'];

$actualizarStatus = $propuestas->aceptarPropuesta($id_propuesta);

header("location:propuestas.php");


 ?>
