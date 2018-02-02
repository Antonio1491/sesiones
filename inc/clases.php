<?php

class Conexion{
  var $servidor;
  var $usuario;
  var $password;
  var $baseDeDatos;
  var $mysql;

  function Conexion($ser, $us, $ps, $bd){
    $this->servidor = $ser;
    $this->usuario = $us;
    $this->password = $ps;
    $this->baseDeDatos = $bd;

    $mysql = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->baseDeDatos) or die ("Se perdio la conexión a la Base de Datos");
    mysqli_select_db($mysql, $this->baseDeDatos) or die ("No se encuentra la Base de Datos seleccionada");
    $mysql->set_charset("utf8");
    $this->mysql = $mysql;
    return $this->mysql;
  }
  function insertarDatos($consulta){
    if(mysqli_query($this->mysql, $consulta)){
      echo"<script language='JavaScript'>
                  alert('Registro realizado con éxito');
                  </script>";
      echo "<script>window.history.go(-1);</script>";
    }
    else{
      echo"<script language='JavaScript'>
                  alert('Error: No pudimos realizar el registro');
                  </script>";
      echo "<script>window.history.go(-1);</script>";
    }
  }
  function consultar($sql){
    $resultado = $this->mysql->query($sql);
    if ($numFilas = mysqli_num_rows($resultado) >0) {
      return $resultado;
    }
    else{
      echo "Usuario ó Password no encontrado";
    }
  }
  function actualizar($sql){
    if($resultado = mysqli_query($this->mysql, $sql)){
      echo"<script language='JavaScript'>
                  alert('Actualización realizada');
                  </script>";
      echo "<script>window.history.go(-2);</script>";
    }
    else{
      echo"<script language='JavaScript'>
                  alert('Error: No pudimos actualizar');
                  </script>";
      echo "<script>window.history.go(-1);</script>";
    }

  }
  function eliminarRegistro($consulta){
    if(mysqli_query($this->mysql, $consulta)){
      echo"<script language='JavaScript'>
                  alert('Registro Eliminado');
                  </script>";
      echo "<script>window.history.go(-1);</script>";
    }
    else {
      echo "No pudimos elimar el registro";
    }
  }

  function consultarFirma($sql){
    $resultado = mysqli_query($this->mysql, $sql);
    if ($numFilas = mysqli_num_rows($resultado) >0) {
        echo"FIRMADO ";
    }
    else{
      echo'
      <form class="" action="firmar_acuerdo.php" method="post">
        <input type="checkbox" name="firma" value="ACEPTO">
        <label for=""><strong>Acepto todos los acuerdos, términos y condiciones.</strong></label>
        <br><input type="submit" name="" value="Aceptar" class="button">
      </form>
      ';
    }
  }

}



class Verificar{
    function campoDefinido($campo){
      if(isset ($campo) && $campo <> "")
      {
       return true;
      }
      else {
      return false;
    }
  }
  function categoria($categoria){
    switch ($categoria) {
      case '1':
        header('Location:../admin/index.php');
        break;
      case '2':
        header('Location:../conferencistas/index.php');
        break;
    }
  }

}

?>
