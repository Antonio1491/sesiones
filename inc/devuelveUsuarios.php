<?php

require('conexion.php');

class DevuelveUsuarios extends Conexion{   //utilizar variables y métodos dentro la clase conexión

  public function DevuelveUsuarios(){

      parent::__construct();

  }

  public function get_usuarios(){
      $resultado = $this->conexion_db->query('SELECT * FROM usuarios');

      $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

      return $usuarios;
  }

}


 ?>
