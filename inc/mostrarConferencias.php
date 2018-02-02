<?php

  require('conexion.php');

  class MostrarConferencia extends Conexion{

      public function __construct(){

        parent::__construct();

      }

      public function listaConferencias(){

        $resultado = $this->conexion_db->query('SELECT * FROM conferencias');

        $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);

        return $conferencias;

      }

  }

 ?>
