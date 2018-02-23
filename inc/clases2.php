<?php

require('conexion.php');

class DevuelveUsuarios extends Conexion{   //utilizar variables y métodos dentro la clase conexión

  public function DevuelveUsuarios(){

      parent::__construct();

  }

  public function get_usuarios(){
      $resultado = $this->conexion_db->query('SELECT * FROM usuarios ORDER BY id_usuario DESC');

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
                                  $biografia, $biografia_ing, $usuario, $conferencia, $id){

      $sql = "UPDATE usuarios SET nombre = '$nombre',
            cargo = '$cargo',
            cargo_ing = '$cargo_ing',
            empresa = '$empresa',
            empresa_ing = '$empresa_ing',
            biografia = '$biografia',
            biografia_ing = '$biografia_ing',
            usuario = '$usuario',
            id_conferencia = '$conferencia'
            WHERE id_usuario = '$id' ";

            $resultado = $this->conexion_db->query($sql);

            return $resultado;

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

// Mostrar lista de conferencias
class MostrarConferencia extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaConferencias(){

      $resultado = $this->conexion_db->query('SELECT * FROM conferencias ORDER BY id_conferencia desc');

      $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);

      return $conferencias;

    }

    public function tipoConferencia(){

      $resultado = $this->conexion_db->query('SELECT * FROM tipo_conferencia');

      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

      return $respuesta;

    }

}

//Mostrar Firmas

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
  public function registroDeUsuario($nombre, $cargo, $cargo_ing, $empresa, $empresa_ing, $biografia, $biografia_ing, $fotografia, $usuario,
                                    $password, $nivel, $prioridad, $conferencia){

      $resultado = $this->conexion_db->query("INSERT INTO usuarios
                                              VALUES ( null, '$nombre', '$cargo','$cargo_ing',
                                                '$empresa', '$empresa_ing', '$biografia', '$biografia_ing',
                                                '$fotografia', '$usuario',
                                                '$password', '$nivel', '$prioridad',
                                                0,'$conferencia')");

      return $resultado;

  }
}

// Registrar Conferencias
class RegistroConferencia extends Conexion{

  public function __construt(){

    parent::__construt();

  }

  public function registrar($conf, $conf_ing, $f, $hr, $hrf, $lugar, $desc, $desc_ing, $tema){

    echo $conf, $f, $hr, $hrf, $lugar, $desc, $tema;

    $sql = $this->conexion_db->query("INSERT INTO conferencias
                                      VALUES (null, '$conf', '$conf_ing', '$f',
                                              '$hr', '$hrf', '$lugar',
                                              '$desc', '$desc_ing', '$tema')");

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

    $resultado = $this->conexion_db->query("SELECT a.nombre, a.cargo, a.cargo_ing, a.empresa, a.empresa_ing, a.biografia, a.biografia_ing, a.usuario, a.id_conferencia, b.nombre_conferencia
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

// Eliminar usuarios y conferencias
class EliminarRegistro extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function eliminar($id, $tabla){

    $sql = $this->conexion_db->query("DELETE FROM $tabla WHERE id_usuario = $id ");

    return $sql;

  }

  public function eliminarConferencia($id){

    $sql = $this->conexion_db->query("DELETE FROM conferencias WHERE id_conferencia = $id");

    return $sql;

  }
}



// =======  Sistema de login   ======
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
              }
                  if ($nivel == 1) {
                      $mensaje = header("Location: ../admin/index.php?id=$id_usuario");
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


// =============== conferencistas ==============

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




 ?>
