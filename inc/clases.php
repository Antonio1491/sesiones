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
    mysqli_select_db($mysql, $this->baseDeDatos) or die ("Error en la Base de Datos seleccionada");
    mysqli_set_charset($mysql, "utf8");
    $this->mysql = $mysql;
    return $this->mysql;
  }
  function iniciarSesionBd(){
    // $mysql = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->baseDeDatos) or die ("Se perdio la conexión a la Base de Datos");
    // mysqli_select_db($mysql, $this->baseDeDatos) or die ("Error en la Base de Datos seleccionada");
    // mysqli_set_charset($mysql, "utf8");
    // $this->mysql = $mysql;
    // return $this->mysql;
  }
  function insertarDatos($consulta){
    if($resultado = mysqli_query($this->mysql, $consulta)){
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
    $resultado = mysqli_query($this->mysql, $sql);
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
  function eliminarRegistro($tabla, $columna, $id){
    $sql = "DELETE FROM $tabla WHERE $columna = $id";
    if($resultado = mysqli_query($this->mysql, $sql)){
      echo"<script language='JavaScript'>
                  alert('Registro Eliminado');
                  </script>";
      echo "<script>window.history.go(-1);</script>";
    }
    else {
      echo "No pudimos elimar el registro";
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
        echo "conferencista";
        break;
    }
  }
}

?>
