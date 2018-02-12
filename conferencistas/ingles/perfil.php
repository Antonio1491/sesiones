<?php session_start();

require ("../../inc/clases2.php");

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bienvenidos Conferencistas</title>
   <link rel="stylesheet" href="../../css/foundation.css">
   <link rel="stylesheet" href="../css/app-conferencistas.css">
   <link rel="stylesheet" href="../../font/foundation-icons.css">
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
   <script type="text/javascript" src="../../js/app.js"></script>
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

             // echo $_SESSION['id_usuario'];

              $datos_conferencista = new Conferencista();

              $array_datos = $datos_conferencista->mostrarDatos($_SESSION['id_usuario']);

              foreach ($array_datos as $valor) {

                  echo "<div class='contenido-perfil'><img class='foto' src='http://www.congresoparques.com/sesiones/img/conferencistas/".$valor['foto']."'>";
                  echo "<strong>First Name: </strong>" .$valor['nombre'];
                  echo "<br><strong>Position: </strong>" .$valor["cargo"];
                  echo "<br><strong>Company: </strong>" .$valor["empresa"];
                  echo "<br><p><strong>Biography: </strong>" .$valor["biografia"];
                  echo "</p>";
                }

              ?>
           </div>
           <!-- <div class="row">
             <button type="button" name="button" id="editar-datos" class="button">Editar Datos</button>
           </div> -->
         </section>
         <section id="editar-perfil">
            <form class="" action="actualizar_perfil.php" method="post">
               <fieldset>
                 <div class="row">
                   <legend><h4>Editar Datos</h4></legend>
                 </div>
                 <?php
                    $sql = "SELECT * FROM usuarios WHERE id_usuario = ".$_SESSION["id_usuario"];
                    $resultado = $conexion->consultar($sql);
                    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                      echo  "<div class='row'><div class='column medium-6'><label>First name:</label>";
                      echo "<input type='text' name='nombre' value='".$fila["nombre"]."'></div>";
                      echo "<div class='column medium-6'><label>Position:</label>";
                      echo "<input type='text' name='cargo' value='".$fila["cargo"]."'></div></div>";
                      echo "<div class='row'><div class='column medium-6'><label>Company</label>";
                      echo "<input type='text' name='empresa' value='".$fila["empresa"]."'></div></div>";
                      echo "<div class='row'><div class='column medium-12'><label>Biography:</label>";
                      echo "<textarea name='biografia' rows='6' cols='1' value='".$fila["biografia"]."' >".$fila['biografia']."</textarea></div></div>";
                    }
                  ?>
               </fieldset>
               <div class="row text-center">
                 <div><input type="submit" name="" value="Actualizar" class="button"></div>
               </div>
             </form>

         </section>
       </div>
     </div>
   </main>
   <footer></footer>
 </body>
 </html>
