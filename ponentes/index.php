<?php session_start();
$_SESSION["id_usuario"];
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Ponentes</title>
     <link rel="stylesheet" href="../css/foundation.css">
     <link rel="stylesheet" href="css/app-ponentes.css">
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
          <header><h3>Bienvenid@</h3></header>
          <p>Felicidades por ser parte del 1er Congreso Internacional de Parques Urbanos en Mérida, Yucatán 2017.</p>
          <p>Esta es la plataforma digital para ponentes en la cual podrás:</p>
          <ul>
            <li>Revisar y modificar toda tu información personal y profesional en Mi perfil</li>
            <li>Firmar los acuerdos, términos y condiciones de tu participación.</li>
            <li>Subir tu material audiovisual como: presentación de PowerPoint de la sesión, folletos, vídeos e información adicional.</li>
            <li>Consultar información de tu sesión, como: horario y salón en donde tendrá lugar.</li>
          </ul>
       </section>
     </main>
     <footer></footer>

   </body>
 </html>
