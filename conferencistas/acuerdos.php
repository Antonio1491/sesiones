<?php session_start();

   require("../inc/clases2.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bienvenidos Conferencistas</title>
  <link rel="stylesheet" href="../css/foundation.css">
  <link rel="stylesheet" href="css/app-conferencistas.css">
  <link rel="stylesheet" href="../font/foundation-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
</head>
<body>
  <header></header>
  <main>
    <div class="row collapse expanded">
      <div class="column medium-2">
        <?php include("menu.php"); ?>
      </div>
      <div class="column medium-10">
        <section id="acuerdos">
          <div class="row">
            <article class="">
              <h4>ACUERDOS, TÉRMINOS Y CONDICIONES.</h4>
              <h5>Asociación Nacional de Parques y recreación de México</h5> <h6>Mérida, Yucatán - 2018</h6>
              <p>Gracias por aceptar participar en el 1er Congreso Internacional de Parques Urbanos que tendrá
                lugar del 25 al 27 de Abril del 2018 en Mérida, Yucatán. En este documento se encuentran los
                acuerdos, términos y condiciones en relación a la ponencia que usted presentará en el congreso.
                Por favor, revise los detalles este documento y firme que está de acuerdo con las condiciones
                antes del VIERNES 30 DE MARZO DEL 2018. </p>
              <p>De igual forma, le solicitamos revisar su información personal y datos generales de su
                conferencia o sesión para asegurar que están correctos. Cualquier comentario o corrección
                contacte a Cristina R. de León, Directora de Educación y Contenido al correo: contenido@anpr.org.mx</p>
            </article>
            <article class="">
              <h5>EQUIPO AUDIOVISUAL</h5>
              <p>Cada salón contará con una computadora (PC - Windows), un proyector, una pantalla de proyección,
                un pódium con un micrófono presidencial y dos micrófonos .Usted no necesita traer una laptop para
                su presentación, ya que habrá una en cada salón, pero tendrá que enviar su material audiovisual
                en un formato compatible a la computadora que se proporcionará (PC - Windows), ya que su
                presentación será precargada.</p>
                <p>El material audiovisual debera ser cargado en el apartado DOCUMENTOS de este sistema,
                  antes del VIERNES 30 DE MARZO DEL 2018.</p>
                <p>Formatos aceptados:
                  <ul>
                    <li>Power Point (.pptx). </li>
                    <li>MP4 o .MOV para videos si estos forman parte de su presentación.</li>
                    INFORMACIÓN ADICIONAL
                    <li>El material audiovisual que usted nos proporcione, estará disponible
                       para los miembros de la Asociación Nacional de Parques y Recreación
                       de México en la página oficial de la misma, posterior a las fechas del congreso.</li>
                    <li>El comité organizador del 1er Congreso Internacional de Parques Urbanos no
                      proporcionará material impreso para las sesiones educativas. Si el ponente
                      desea otorgar este material, deberá hacerlo por su propia cuenta y proporcionar
                      suficiente material para todos los asistentes a la sesión - capacidad máxima
                      de los salones: 200 personas.</li>
                  </ul>
                </p>

            </article>
            <article class="">
              <h5>DERECHOS DE AUTOR Y LICENCIAS</h5>
              <p>Aceptando ser ponente del 1er Congreso Internacional de Parques Urbanos, por medio de la presente, le otorgo a
                la Asociación Nacional de Parques y Recreación de México el derecho a:</p>
              <ol>
                <li>Grabar, copiar y transcribir mi presentación, incluyendo materiales orales, escritos y visuales.</li>
                <li>Distribuir mi presentación y materiales adicionales en formato PDF en la página web de la Asociación
                   Nacional de Parques y Recreación de México. </li>
                <li>La toma de fotografías y vídeo durante mi presentación para efectos publicitarios en cualquier formato
                  (impreso o electrónico) de la Asociación Nacional de Parques y Recreación de México y el Congreso
                  Internacional de Parques Urbanos en sus futuras ediciones. </li>
                <li>Esta firma de acuerdos, términos y condiciones, corresponde a los materiales entregados sobre su
                  conferencia magistral o sesión educativa en el 1er Congreso Internacional de Parques Urbanos y no
                  limita de ninguna manera el uso personal de estos materiales. La propiedad de esta presentación y
                  materiales sigue siendo de usted o de cualquier otra parte involucrada. En esta firma también declara
                  que su presentación no infringirá ningún derecho de autor o incluirá ningún material que sea difamatorio,
                  escandaloso o una invasión de privacidad hacia terceras personas.</li>
              </ol>
            </article>
            <article class="">
              <h5>AVISO DE PRIVACIDAD</h5>
              <p>Entiendo que las opiniones expresadas en mi conferencia magistral o sesión educativa son mías y no las de la
                Asociación Nacional de Parques y Recreación de México. A través de la presente, garantizo que los materiales,
                audiovisuales y cualquier otro material preparado para mi presentación, no infringen ningún derecho de autor ni
                violan ningún otro derecho de ninguna persona o parte. Estoy de acuerdo en mantener a la Asociación Nacional de
                Parques y Recreación de México ya sus miembros libres en todo momento contra cualquier reclamo, responsabilidad,
                pérdida, daño, costos y gastos, incluyendo, honorarios de abogados, derivados de mi uso personal o el uso de
                Asociación Nacional de Parques y Recreación de México de los materiales mencionados por una violación de la garantía anterior.</p>
              <p>Es importante recordar que en las sesiones educativas del 1er Congreso Internacional de Parques Urbanos no
                son un espacio de promoción y/o venta de productos y/o servicios. Los momentos de networking previos o posteriores
                al momento de aprendizaje serán los adecuados para esos propósitos.</p>
            </article>
          </div>
          <div class="row">
            <em style="font-family: 'Tangerine', cursive; font-size: 40px;">Atte. Cristina R. de León, Directora de Educación y Contenido.  </em>
          </div>
          <div class="row">

              <?php

                $firma = new Conferencista();

                $respuesta = $firma->comprobarFirma($_SESSION['id_usuario']);

                if ($respuesta) {

                      foreach ($respuesta as $valor) {
                        # code...
                      }
                      echo "Firmado por: " .$valor['nombre'];

                }
                else{

                  $mensaje = '<div class="">
                                <form class="" action="firmar_acuerdo.php" method="post">
                                  <input type="checkbox" name="firma" value="1">
                                  <label for=""><strong>Acepto todos los acuerdos, términos y condiciones.</strong></label>
                                  <br><input type="submit" name="" value="Aceptar" class="button">
                                </form>
                              </div>';

                  echo $mensaje;

                }

              ?>



          </div>
        </section>
      </div>
    </div>
  </main>
  <footer>
    <?php include ("footer.php"); ?>
  </footer>
</body>
</html>
