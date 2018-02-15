<?php session_start();
$id = $_SESSION['id_usuario'];


require ("../inc/clases2.php");

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
         <section id="informacion-perfil">
           <div class="row">
             <?php

              $datos_conferencista = new Conferencista();

              $array_datos = $datos_conferencista->mostrarDatos($id);

              foreach ($array_datos as $valor) {

                  echo "<div class='contenido-perfil'><img class='foto' src='http://www.congresoparques.com/sesiones/img/conferencistas/".$valor['foto']."'>";
                  echo "<strong>Name: </strong>" .$valor['nombre'];
                  echo "<br><strong>Position: </strong>" .$valor["cargo_ing"];
                  echo "<br><strong>Company: </strong>" .$valor["empresa_ing"];
                  echo "<br><p><strong>Biography: </strong>" .$valor["biografia_ing"];
                  echo "</p>";
                }

              ?>
           </div>

       </div>
     </div>
   </main>
   <footer></footer>
 </body>
 </html>
