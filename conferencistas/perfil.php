<?php session_start();

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
   <link rel="stylesheet" href="css/app-conferencistas.css">
   <link rel="stylesheet" href="../font/foundation-icons.css">
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
         <section id="informacion-perfil">
           <div class="row">
             <?php

             // echo $_SESSION['id_usuario'];

              $datos_conferencista = new Conferencista();

              $array_datos = $datos_conferencista->mostrarDatos($_SESSION['id_usuario']);

              foreach ($array_datos as $valor) {

                  echo "<div class='contenido-perfil'><img class='foto' src='http://www.congresoparques.com/sesiones/img/conferencistas/".$valor['foto']."'>";
                  echo "<strong>Nombre: </strong>" .$valor['nombre'];
                  echo "<br><strong>Cargo: </strong>" .$valor["cargo"];
                  echo "<br><strong>Empresa: </strong>" .$valor["empresa"];
                  echo "<br><p><strong>Biografía: </strong>" .$valor["biografia"];
                  echo "</p>";
                }

              ?>
           </div>
           <!-- <div class="row">
             <button type="button" name="button" id="editar-datos" class="button">Editar Datos</button>
           </div> -->
         </section>
        
       </div>
     </div>
   </main>
   <footer>
     <?php include ("footer.php"); ?>
   </footer>
 </body>
 </html>
