<?php
session_start();
require('clases2.php');

// $email = $mysqli->real_escape_string($_POST['email']);
// $password = $mysqli->real_escape_string($_POST['password']);
$email = $_POST['email'];
$password = $_POST['password'];

$comprobar = new Login();
$resultado = $comprobar->verificarCampos($email, $password);

echo $resultado;

 ?>
