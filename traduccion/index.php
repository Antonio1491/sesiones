<?php session_start();

 // $_SESSION['id_usuario'] = $_GET['id'];

$id = $_SESSION['id_usuario'];

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bienvenidos Conferencistas</title>
  <link rel="stylesheet" href="../css/foundation.css">
  <link rel="stylesheet" href="../conferencistas/css/app-conferencistas.css">
  <link rel="stylesheet" href="../font/foundation-icons.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
</head>
<body>
  <header><h3 class="text-center">1st International Congress of Urban Parks 2018</h3></header>
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
            <p><strong>Hi, thanks for being part of the 1st International Congress of Urban Parks!</strong></p>
            <p>This is an exclusive platform for keynote and educational sessions’ speakers. Some
              of the tasks you are able to perform on it in order to make your presentation time
              easy and efficient are:</p>
              <ul>
                <li>Review all your personal and professional information in  <a href="perfil.php" class="subrayado">“My profile”</a>.</li>
                <li>Sign the<a href="acuerdos.php" class="subrayado"> agreements, terms and conditions </a> of your participation.</li>
                <li><a href="documentacion.php" class="subrayado">Upload</a> your presentation files such as: PowerPoint presentation, videos and/or any additional information you may have.</li>
                <li>Find information <a href="conferencia.php" class="subrayado">related to your session or conference</a>, such as: schedule and lounge.</li>
              </ul>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer></footer>
</body>
</html>
