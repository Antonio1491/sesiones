<?php

require('conexion.php');

class DevuelveUsuarios extends Conexion{   //utilizar variables y métodos dentro la clase conexión

  public function __construct(){

      parent::__construct();

  }

  public function get_usuarios($evento){//despliega listas de usuarios (conferencistas del congreso)
      $resultado = $this->conexion_db->query("SELECT * FROM usuarios WHERE nivel = 2 AND evento = '$evento'
                              ORDER BY id_usuario DESC");

      $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

      return $usuarios;
  }

}

//Actualizar Usuarios
class ActualizarUsuario extends Conexion{

  public function __construct(){

    parent::__construct();

  }
  public function actualizar($nombre, $cargo, $cargo_ing, $empresa, $empresa_ing,
                                  $biografia, $biografia_ing, $localidad, $usuario, $conferencia, $id){

      $sql = "UPDATE usuarios SET nombre = '$nombre',
            cargo = '$cargo',
            cargo_ing = '$cargo_ing',
            empresa = '$empresa',
            empresa_ing = '$empresa_ing',
            biografia = '$biografia',
            biografia_ing = '$biografia_ing',
            localidad = '$localidad',
            usuario = '$usuario',
            id_conferencia = '$conferencia'
            WHERE id_usuario = '$id' ";

            $resultado = $this->conexion_db->query($sql);

            return $resultado;

  }

  public function actualizarPerfil($nombre, $cargo, $empresa, $biografia, $id){
      $sql = "UPDATE usuarios SET nombre = '$nombre',
            cargo = '$cargo',
            empresa = '$empresa',
            biografia = '$biografia'
            WHERE id_usuario = '$id'  ";

            $consulta = $this->conexion_db->query($sql);

            return $consulta;
  }

}

//Actualizar Conferencia
class ActualizarConferencia extends Conexion{

  public function __construct(){

    parent::__construct();

  }
  public function actualizar($conf, $conf_ing, $f, $hr, $hrf, $lugar, $desc, $desc_ing, $tema, $id){

      $sql = "UPDATE conferencias SET nombre_conferencia = '$conf',
              nombre_conferencia_ing = '$conf_ing',
              fecha = '$f',
              hora = '$hr',
              hora_fin = '$hrf',
              lugar = '$lugar',
              descripcion = '$desc',
              descripcion_ing = '$desc_ing',
              id_tema = '$tema'
              WHERE id_conferencia = '$id' ";

      $resultado = $this->conexion_db->query($sql);

      return $resultado;

  }
}

// Desplegar lista de temas
class ListaTemas extends Conexion{

  public function __parent(){

    parent::_construct();

  }

  public function desplegarTemas(){

    $resultado = $this->conexion_db->query('SELECT * FROM temas');

    $temas = $resultado->fetch_all(MYSQLI_ASSOC);

    return $temas;

  }

}





// ==========   Mostrar lista de conferencias  ===============

class MostrarConferencia extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaConferencias($evento){
      $sql = "SELECT *
              FROM conferencias
              WHERE evento = '$evento'
              ORDER BY id_conferencia DESC";
      $resultado = $this->conexion_db->query($sql);
      $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);
      return $conferencias;
    }

    public function tipoConferencia(){
      $resultado = $this->conexion_db->query('SELECT * FROM tipo_conferencia');
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function listaPropuestas(){  //Lista de propuestas registradas en la convocatoria
      $resultado = $this->conexion_db->query('SELECT DISTINCT a.id_conferencia, a.conferencia, a.enlaceEncuesta, a.status, b.nombre,
                                            b.apellidos, b.localidad FROM conferencia AS a
                                            INNER JOIN conferencista AS b
                                            ON a.id_conferencia = b.id_conferencia
                                            GROUP BY id_conferencia');
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function propuestasAsignadas($id_tema){ //Asignasión de tema a usuario comité
      $resultado = $this->conexion_db->query("SELECT DISTINCT a.id_conferencia, a.conferencia, a.id_tema, b.nombre,
                                            b.apellidos, b.localidad FROM conferencia AS a
                                            INNER JOIN conferencista AS b
                                            ON a.id_conferencia = b.id_conferencia
                                            WHERE a.id_tema = $id_tma
                                            GROUP BY id_conferencia");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function descripcionPropuesta($id){
      $sql = "SELECT * FROM conferencia
              INNER JOIN temas ON conferencia.id_tema = temas.id_tema
              WHERE  conferencia.id_conferencia= $id ";
      $consulta = $this->conexion_db->query($sql);
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      return $respuesta;

    }

    public function mostrarAutores($id){
      $sql = "SELECT *
            FROM conferencista
            WHERE $id= id_conferencia";
      $consulta = $this->conexion_db->query($sql);
      $array = $consulta->fetch_all(MYSQLI_ASSOC);
      return $array;
    }

    public function totalPropuestas(){ //Muestra el número de conferencias registradas en la convocatoria
      $consulta = $this->conexion_db->query("SELECT count(id_conferencia) AS totalRegistros FROM conferencia ");
      $respuesta = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($respuesta as $value) {
        $resultado = $value['totalRegistros'];
      }
      return $resultado;
    }

    public function aceptarPropuesta($id_propuesta){ //Aceptacion de propuesta registrada (cambio de status)
      $sql= "UPDATE conferencia SET status = 1 WHERE id_conferencia = $id_propuesta";
      $consulta = $this->conexion_db->query($sql);
      return $consulta;
    }

    public function enviarPropuestaAceptada($id_propuesta){//copiar la conferencia de la tabla propuesta a tabla de aceptados

    }



}

//========== Mostrar Firmas ================
class Firmas extends Conexion {

  public function __parent(){

      parent::__construct();

  }

  public function desplegarFirmas(){

    $resultado = $this->conexion_db->query("SELECT nombre, usuario, firmado FROM usuarios WHERE nivel = 2");

    $array_firmas = $resultado->fetch_all(MYSQLI_ASSOC);

    return $array_firmas;

  }

}

//  Registrar usuarios
class RegistrarUsuario extends Conexion{

  public function __construct(){

    parent::__construct();

  }
  public function registroDeUsuario($nombre, $cargo, $cargo_ing, $empresa, $empresa_ing, $biografia, $biografia_ing, $localidad, $fotografia, $usuario,
                                    $password, $nivel, $prioridad, $conferencia, $evento){

      $resultado = $this->conexion_db->query("INSERT INTO usuarios
                                              VALUES ( null, '$nombre', '$cargo','$cargo_ing',
                                                '$empresa', '$empresa_ing', '$biografia', '$biografia_ing', '$localidad',
                                                '$fotografia', '$usuario',
                                                '$password', '$nivel', '$prioridad',
                                                0,'$conferencia', '$evento')");

      return $resultado;

  }
}

// Registrar Conferencias
class RegistroConferencia extends Conexion{

  public function __construt(){

    parent::__construt();

  }

  public function registrar($conf, $conf_ing, $f, $hr, $hrf, $lugar, $desc, $desc_ing, $tema, $evento){

    // echo $conf, $f, $hr, $hrf, $lugar, $desc, $tema;

    $sql = $this->conexion_db->query("INSERT INTO conferencias
                                      VALUES (null, '$conf', '$conf_ing', '$f',
                                              '$hr', '$hrf', '$lugar',
                                              '$desc', '$desc_ing', '$tema', null, '$evento')");

    return $sql;

  }

}


//Mostrar datos de usuario
class DatosUsuario extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function mostrarDatosUsuario($id){

    $folio = $id;

    $resultado = $this->conexion_db->query("SELECT a.nombre, a.cargo, a.cargo_ing, a.empresa, a.empresa_ing, a.biografia, a.biografia_ing, a.localidad, a.usuario, a.id_conferencia, b.nombre_conferencia
    FROM usuarios  AS a
    RIGHT JOIN conferencias AS b ON b.id_conferencia = a.id_conferencia
    WHERE id_usuario = '$folio' ");

    $datos = $resultado->fetch_all(MYSQLI_ASSOC);

    return $datos;

  }

}

//Mostrar datos de la conferencias
class DatosConferencia extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function mostrarConferencia($id){

    $resultado = $this->conexion_db->query("SELECT  a.nombre_conferencia, a.nombre_conferencia_ing, a.fecha, a.hora, a.hora_fin,  a.lugar,
                                            a.descripcion, a.descripcion_ing, b.id_tema, b.nombre
                                            FROM conferencias AS a
                                            LEFT JOIN temas as b ON b.id_tema = a.id_tema
                                            WHERE id_conferencia = '$id' ");

    $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

    return $respuesta;

  }
}

//================= Eliminar usuarios y conferencias =============================
class EliminarRegistro extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function eliminar($id, $tabla){

    $sql = $this->conexion_db->query("DELETE FROM $tabla WHERE id_usuario = $id ");

    return $sql;

  }

  public function eliminarConferencia($id){

    $sql = $this->conexion_db->query("DELETE FROM conferencias WHERE id_conferencia = $id ");

    return $sql;

  }
}



// =================  Sistema de login   =========================
class Login extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function verificarCampos($us, $pas){

    if ((isset ($us) && $us != '') && (isset ($pas) && $pas != ''))  {

        // echo "tenemos datos" . $us . " - ". $pas;
        $sql = $this->conexion_db->query("SELECT * FROM usuarios
                                    WHERE usuario = '$us'
                                    AND password = '$pas' ");

        $respuesta = $sql->fetch_all(MYSQLI_ASSOC);

        if ($respuesta) {
              foreach ($respuesta as $valor){
                $id_usuario = $valor['id_usuario'];
                $nivel = $valor['nivel'];
                // $valor['id_usuario'] = $_SESSION['id_usuario'];
              }
                  if ($nivel == 1) {
                      $mensaje = header("Location: ../admin/index.php?id=$id_usuario");
                      return $mensaje;
                    }
                    else if($nivel == 3){
                      $mensaje = header("Location: ../admin/propuestas_calificar.php?id=$id_usuario");
                      return $mensaje;
                    }
                    else {
                      $mensaje = header("Location: ../conferencistas/index.php?id=$id_usuario");
                      return $mensaje;
                    }
        }
        else {
          $mensaje = "Usuario o contraseña incorrectos";
          return $mensaje;
        }

      }
      else {
        $mensaje = "Completa los datos faltantes";

        return $mensaje;
      }
  }

}
// ==============  Fin sistema de login ================

// =============== conferencistas ======================

class Conferencista extends Conexion
{

  public function __construct()
  {

    parent::__construct();

  }

  public function mostrarDatos($id){

    $sql = $this->conexion_db->query("SELECT * FROM usuarios WHERE id_usuario = '$id' ");

    $resultado = $sql->fetch_all(MYSQLI_ASSOC);

    return $resultado;

  }

  public function comprobarFirma($id){

    $sql = $this->conexion_db->query("SELECT * FROM usuarios WHERE id_usuario = '$id' AND firmado = 1 ");

    $resultado = $sql->fetch_all(MYSQLI_ASSOC);

    return $resultado;

  }

    public function firmar($id){

      $sql = $this->conexion_db->query("UPDATE usuarios SET firmado = 1 WHERE id_usuario = $id ");

      return $sql;

    }

    public function datosConferencia($id){

      $sql = $this->conexion_db->query("SELECT *
                                    FROM usuarios
                                    LEFT JOIN conferencias
                                    ON conferencias.id_conferencia = usuarios.id_conferencia
                                    LEFT JOIN temas ON temas.id_tema = conferencias.id_tema
                                    WHERE usuarios.id_usuario = $id");

        $resultado = $sql->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

      public function cargarDocumentos($nom_ppt, $tipo_ppt, $tmp_ptt, $nom_video, $tipo_video, $tmp_video, $link, $id){

        // Ruta de la carpeta destino para los archivos cargados
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/sesiones/conferencistas/uploads/';

        if (($tipo_ppt == "application/vnd.ms-powerpoint" ||
            $tipo_ppt == "application/vnd.openxmlformats-officedocument.presentationml.presentation" ||
            $tipo_ppt == "application/vnd.openxmlformats-officedocument.presentationml.slideshow" ||
            $tipo_ppt == "application/vnd.openxmlformats-officedocument.presentationml.template" ||
            $tipo_ppt == "application/vnd.openxmlformats-officedocument.presentationml.slide") &&
            ($tipo_video == "video/mp4" || $tipo_video == "video/x-ms-wmv")) {

                //Mover el archivo de la carpeta temporal a la carpeta $destino
                move_uploaded_file($tmp_ptt, $carpeta_destino.$nom_ppt);

                move_uploaded_file($tmp_video, $carpeta_destino.$nom_video);

                $sql = "INSERT INTO documentos VALUES (null, '$nom_ppt', '$nom_video', '$link', '$id')";

                $resultado = $this->conexion_db->query($sql);

                return  true;

        }
          else{

            return false;

          }

      }

      public function comprobarDocumentos( $id_usuario){

        $resultado = $this->conexion_db->query("SELECT * FROM documentos WHERE id_usuario = $id_usuario");

        $array = $resultado->fetch_all(MYSQLI_NUM);

        return $array;

      }

      public function listarDocumentos(){

        $resultado = $this->conexion_db->query("SELECT *
                FROM usuarios
                LEFT JOIN documentos ON documentos.id_usuario = usuarios.id_usuario
                WHERE usuarios.nivel = 2");

        $array = $resultado->fetch_all(MYSQLI_ASSOC);

        return $array;

      }


}



class Comite extends Conexion {

  public function __parent(){

      parent::__construct();

  }

  public function sesionesAsignadas($id_usuario){

    $sql = "SELECT *
    FROM comite_evaluador
    LEFT JOIN conferencia ON comite_evaluador.id_tema = conferencia.id_tema
    WHERE id_usuario = $id_usuario";

    $respuesta = $this->conexion_db->query($sql);

    $array = $respuesta->fetch_all(MYSQLI_ASSOC);

    return $array;

  }

  public function seleccionarTema($tematica){

    $sql = "SELECT DISTINCT a.id_conferencia, a.conferencia, a.id_tema, a.enlaceEncuesta, b.nombre,
                                          b.apellidos, b.localidad FROM conferencia AS a
                                          INNER JOIN conferencista AS b
                                          ON a.id_conferencia = b.id_conferencia
                                          WHERE a.id_tema = $tematica
                                          GROUP BY id_conferencia";

    $respuesta = $this->conexion_db->query($sql);

    $array = $respuesta->fetch_all(MYSQLI_ASSOC);

    return $array;

  }

  //check individual para la calificación de las encuestas.
  public function nombreTematica($id){

    $sql = "SELECT * FROM temas WHERE id_tema = $id";

    $respuesta = $this->conexion_db->query($sql);

    $array = $respuesta->fetch_all(MYSQLI_ASSOC);

    foreach ($array as $valor) {
      $tema = $valor["nombre"];
        return $tema;
    }



  }

}


//Información de voluntarios
class Voluntarios extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function listaVoluntarios(){
      $sql = "SELECT * FROM voluntarios";
      $consultar = $this->conexion_db->query($sql);
      $array_voluntarios = $consultar->fetch_all(MYSQLI_ASSOC);

      return $array_voluntarios;

    }

  }






 ?>
