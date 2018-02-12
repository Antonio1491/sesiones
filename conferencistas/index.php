<?php session_start();

 $_SESSION['id_usuario'] = $_GET['id'];

// echo $_SESSION['id_usuario'];

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
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
</head>
<body>
  <header><h3 class="text-center">1er Congreso Internacional de Parques Urbanos 2018</h3></header>
  <main>
    <div class="row collapse expanded">
      <div class="column medium-2">
        <?php include("menu.php"); ?>
      </div>
      <div class="column medium-10">
        <section id="bienvenida">
          <!-- <div class="row column text-center">
            <img src="../img/usa.png" alt="">
          </div> -->
          <div class="row">
            <p><strong>¡Hola gracias por formar parte del 1er Congreso Internacional de Parques Urbanos!</strong></p>
            <p>Esta es una plataforma exclusiva para conferencistas magistrales y ponentes de sesiones educativas.
              En ella, podrás realizar acciones indispensables para hacer de tu momento de exposición fácil y eficiente como:</p>
            <ul>
              <li>Revisar toda tu información personal y profesional en <a href="perfil.php" class="subrayado">Mi perfil</a>.</li>
              <li>Firmar los <a href="acuerdos.php" class="subrayado">acuerdos, términos y condiciones</a> de tu participación.</li>
              <li><a href="documentacion.php" class="subrayado">Subir tu material</a> audiovisual como: presentación de PowerPoint, videos e información adicional.</li>
              <li>Consultar <a href="conferencia.php" class="subrayado">información de tu sesión</a>, como: horario y salón.  </li>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer></footer>
</body>
</html>
