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

//Actualizar Usuarios
class ActualizarUsuario extends Conexion{

  public function __construct(){

    parent::__construct();

  }
  public function actualizar($nom, $cargo, $em, $bio, $conf, $id){

      $sql = "UPDATE usuarios SET nombre = '$nom',
              cargo = '$cargo',
              empresa = '$em',
              biografia = '$bio',
              id_conferencia = '$conf'
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
  public function actualizar($conf, $f, $hr, $hrf, $lugar, $desc, $tema, $id){

      $sql = "UPDATE conferencias SET nombre_conferencia = '$conf',
              fecha = '$f',
              hora = '$hr',
              hora_fin = '$hrf',
              lugar = '$lugar',
              descripcion = '$desc',
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
  public function registroDeUsuario($nombre, $cargo, $empresa, $biografia, $fotografia, $usuario,
                                    $password, $nivel, $prioridad, $conferencia){

      $resultado = $this->conexion_db->query("INSERT INTO usuarios
                                              VALUES ( null, '$nombre', '$cargo',
                                                '$empresa', '$biografia',
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

  public function registrar($conf, $f, $hr, $hrf, $lugar, $desc, $tema){

    echo $conf, $f, $hr, $hrf, $lugar, $desc, $tema;

    $sql = $this->conexion_db->query("INSERT INTO conferencias
                                      VALUES (null, '$conf', '$f',
                                              '$hr', '$hrf', '$lugar',
                                              '$desc', '$tema')");

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

    $resultado = $this->conexion_db->query("SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.id_conferencia, b.nombre_conferencia
    FROM usuarios  AS a
    RIGHT JOIN conferencias AS b ON b.id_conferencia = a.id_conferencia
    WHERE id_usuario = '$folio' ");

    $datos = $resultado->fetch_all(MYSQL_ASSOC);

    return $datos;

  }

}

//Mostrar datos de la conferencias
class DatosConferencia extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function mostrarConferencia($id){

    $resultado = $this->conexion_db->query("SELECT  a.nombre_conferencia, a.fecha, a.hora, a.hora_fin,  a.lugar,
                                            a.descripcion, b.id_tema, b.nombre
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

        echo "tenemos datos";
        $sql = $this->conexion_db->query("SELECT * FROM usuarios
                                    WHERE usuario = '$us'
                                    AND password = '$pas' ");

        $respuesta = $sql->fetch_all(MYSQL_ASSOC);

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


// =============== conferencistas

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

      $sql = $this->conexion_db->query("SELECT usuarios.id_usuario, conferencias.nombre_conferencia, conferencias.fecha, conferencias.hora, conferencias.hora_fin, conferencias.lugar, conferencias.descripcion , temas.nombre
                                    FROM usuarios
                                    LEFT JOIN conferencias
                                    ON conferencias.id_conferencia = usuarios.id_conferencia
                                    LEFT JOIN temas ON temas.id_tema = conferencias.id_tema
                                    WHERE usuarios.id_usuario = $id");

        $resultado = $sql->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }
}








 ?>
