<?php  session_start();

require('../inc/clases2.php');

$documentos = new Conferencista();

$array_documentos = $documentos->listarDocumentos();

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Documentos</title><link rel="stylesheet" href="../css/foundation.css">
     <link rel="stylesheet" href="css/app-admin.css">
     <link rel="stylesheet" href="../font/foundation-icons.css">
     <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="../js/app.js"></script>
   </head>
   <body>
     <header></header>
     <main class="row expanded">
       <div class="column medium-2">
         <?php include("menu.php") ?>
       </div>
       <div class="column medium-10 contenido">

         <div class="row">
           <?php
             echo "<table>
                     <thead>
                       <tr>
                         <th>Nombre</th>
                         <th>Usuario</th>
                         <th>Presentación</th>
                         <th>Video</th>
                         <th>Link</th>
                       </tr>
                     </thead>
                     <tbody>";
                       foreach ($array_documentos as $elemento) {
                         echo "<tr><td>" . $elemento['nombre'] . "</td>";
                         echo "<td>" . $elemento['usuario'] . "</td>";

                         if ($elemento['presentacion'] <> null) {
                           echo "<td><a href=''><i class='fi-download doc_si'></td>";

                         }
                         else{
                           echo "<td><i class='fi-x doc_no'></i></td>";
                         }
                         echo "<td>" . $elemento['video'] . "</td>";
                         echo "<td>" . $elemento['link'] . "</td>";
                         }
                         echo "</tbody>
                       </table>";
              ?>
         </div>

       </div>
     </main>
   </body>
 </html>
