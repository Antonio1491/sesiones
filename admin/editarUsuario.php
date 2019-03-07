<?php session_start();
$id = $_GET['id'];
// require("../inc/datos_conexion.php");
require('../inc/clases2.php');

$usuario = new DatosUsuario();

$array_datos_usuario = $usuario->mostrarDatosUsuario($id);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edición Conferencias</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <header></header>
    <main class="row expanded">
      <div class="column medium-2">
        <?php include("menu.php") ?>
      </div>
      <div class="column medium-10 contenido">
        <div class="">
          <?php

// $sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
// FROM usuarios  AS a
// LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
// WHERE id_usuario = '$id' ";
// $resultado = $conexion->consultar($sql);

        foreach ($array_datos_usuario as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarUsuario.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';

        $tabla = $tabla.'<div class="row ">
                      <div class="column medium-8">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" value="'.$valor['nombre'].'" placeholder="Nombres y Apellidos" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Usuario (e-mail):</label>
                        <input type="text" name="usuario" value="'.$valor['usuario'].'" placeholder="Nombres y Apellidos" >
                      </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-4">
                            <label for="">Cargo:</label>
                            <input type="text" name="cargo" value="'.$valor['cargo'].'" placeholder="Cargo">
                          </div>
                          <div class="column medium-4">
                            <label for="">Empresa:</label>
                            <input type="text" name="empresa" value="'.$valor['empresa'].'" placeholder="Empresa" >
                          </div>
                        </div>';
      $tabla = $tabla.'<div class="row ">
                        <div class="column medium-4">
                          <label for="">Position:</label>
                          <input type="text" name="cargo_ing" value="'.$valor['cargo_ing'].'" placeholder="Cargo">
                        </div>
                        <div class="column medium-4">
                          <label for="">Company:</label>
                          <input type="text" name="empresa_ing" value="'.$valor['empresa_ing'].'" placeholder="Empresa" >
                        </div>
                      </div>';
        $tabla = $tabla.'<div class="row">
                        <div class="column medium-8">
                          <label for="">Localidad:</label>
                          <input type="text" name="localidad" value="'.$valor['localidad'].'" placeholder="País, Ciudad" required>
                        </div>
                      </div>';
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-8">
                            <label for="">Biografía:</label>
                            <textarea name="biografia" rows="4" cols="1" value="'. $valor['biografia'].'">'.  $valor['biografia'].'</textarea>
                          </div>
                        </div>';
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-8">
                            <label for="">Biografía:</label>
                            <textarea name="biografia_ing" rows="4" cols="1" value="'.$valor['biografia_ing'].'">'.$valor['biografia_ing'].'</textarea>
                            </div>
                            </div>';
        $tabla = $tabla. '<div class="row">
                            <div class="column medium-8">
                            <label>Conferencía:
                              <select name="conferencia">
                              <option value="'.$valor['id_conferencia'].'">'.$valor['nombre_conferencia'].'</option>';
                                $lista_conferencias = new MostrarConferencia();
                                $lista_desplegable = $lista_conferencias->listaConferencias('CPM2019');
                                foreach ($lista_desplegable as $value) {
        $tabla = $tabla.        '<option value="'.$value['id_conferencia'].'">'.$value['nombre_conferencia'].'</option>';
                                }
        $tabla = $tabla.'    </select>
                            </label>
                          </div>
                        </div>';
        $tabla = $tabla . '<div class="row">
                            <div class="column">
                              <input type="submit" name="" value="Actualizar" class="success button">
                            </div>
                          </div>
                          </fieldset>
                        </form>
                      </div>';
        }

        echo $tabla;
















 ?>
