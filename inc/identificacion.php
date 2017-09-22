<?php  session_start();
require("clases.php");

$email = $_POST["email"];
$password = $_POST["password"];

$verificarEmail = new Verificar(); //Verificar campo definido
$verificarPassword = new Verificar();

$ve = $verificarEmail->campoDefinido($email);
$vp = $verificarPassword->campoDefinido($password);

if($ve && $vp ){ //ambos campos están definidos
    $conexionBd = new Conexion("localhost", "root", "", "sip2018");
    // $conexionBd = new Conexion("localhost", "anprorgm_admin", "Admin_*2016", "anprorgm_sic");
    $sql = "SELECT * FROM usuarios WHERE usuario = '$email' AND password = '$password' ";
    if ($resultado = $conexionBd->consultar($sql)) {
      while ($fila = mysqli_fetch_array($resultado)){
        $_SESSION["id_usuario"] = $fila['id_usuario'];
        $_SESSION['usuario'] = $fila['usuario'];
        // $_SESSION['password'] = $fila['contrasena'];
        $_SESSION['categoria'] = $fila['nivel'];
      }
      $nivelUsuario = new Verificar();
      $nivelUsuario->categoria($_SESSION['categoria']);
    }
    // $sql = "SELECT * FROM usuarios WHERE usuario = '$email'";
    // if($resultado = $conexionBd->consultar($sql)){
    //     echo "Password incorrecto";
    // }
    // else{
    //   echo"Usuario Incorrecto";
    // }
}
else if( $ve == false && $vp == false){
  // if( $ve == false && $vp ==true)
  echo "Ningún dato Definido";
}
else if ($ve == true){
  echo "Password no definido";
}
else{
  echo "Usuario no definido";
}
// else if($ve == true && $vp ==false){
//   echo "Password no definido o vacío";
// }
// else{
//   echo "campos vacios";
// }



 ?>
