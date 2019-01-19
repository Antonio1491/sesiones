<?php session_start();
$_SESSION['id_usuario'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>

    <link rel="stylesheet" href="css/app-admin.css">
    <link rel="stylesheet" href="../font/foundation-icons.css">
    <link rel="stylesheet" href="../css/foundation.min.css">
  </head>
  <body>
    <header> <h4>Control de Sesiones Educativas</h4></header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("menu.php") ?>
      </div>
      <section class="column medium-10">

      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/what-input.js" type="text/javascript"></script>
    <script src="../js/foundation.min.js" type="text/javascript"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
