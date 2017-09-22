<?php session_start();
$_SESSION["id_usuario"];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>

  </head>
  <body>
    <header></header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("menu.php") ?>
      </div>
      <section class="column medium-10">

      </section>
    </main>
    <footer></footer>
  </body>
</html>
