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
  <link rel="stylesheet" href="../conferencistas/css/app-conferencistas.css">
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
              <h4>AGREEMENTS, TERMS AND CONDITIONS</h4>
              <h5>National Recreation and Park Association of Mexico</h5> <h6>Mérida, Yucatán - 2018</h6>
              <p>Thank you for agreeing to participate in the 1st International Congress of Urban Parks
                that will take place from April 25 to 27, 2018 in Mérida, Yucatán. In this document you
                will find the agreement, terms and conditions related to your presentation at the congress.
                Please, review the details of this document and sign the agreement before or not later than
                 FRIDAY, MARCH 30, 2018.</p>
              <p>Likewise, we ask you to review your personal information and general information of your
                keynote or educational session to ensure that it is correct. Any comments or changes,
                please contact Cristina R. de León, Education and Conference Manager at: contenido@anpr.org.mx</p>
            </article>
            <article class="">
              <h5>AUDIOVISUAL EQUIPMENT</h5>
              <p>Each room will be equipped with a computer (PC - Windows), a projector, a projection screen, a
                podium with a presidential microphone and two wireless microphones. You do not need to bring a
                laptop for your presentation, since there will be one in each room, but you are asked to send your
                audiovisual material in advance and in a compatible format to the computer that will be provided
                (PC - Windows), since your presentation will be preloaded.</p>
                <p>The audiovisual material must be uploaded in the “DOCUMENTS” section of this system,
                  before or not later than FRIDAY, MARCH 30, 2018.</p>
                <p>Accepted formats:
                  <ul>
                    <li>Power Point (.pptx). </li>
                    <li>MP4 or .MOV for videos if they are part of your presentation.</li>
                    ADDITIONAL INFORMATION
                    <li>The audiovisual material that you provide to us, will be available
                      to the members of the National Association of Parks and Recreation of
                      Mexico in its official web page after the congress takes place.</li>
                    <li>The event planning committee of the 1st International Congress of
                      Urban Parks will not provide printed material for the educational
                      sessions. If the speaker wishes to hand out any printed material
                      to the session participants, he is responsible for the cost of the
                      print, and must account on providing material to all attendees
                      (maximum capacity of the rooms is 200 people).</li>
                  </ul>
                </p>

            </article>
            <article class="">
              <h5>COPYRIGHT AND LICENSES</h5>
              <p>By accepting to be a speaker of the 1st International Congress of Urban Parks, I grant
                 the National Recreation and Park Association of Mexico the right to:</p>
              <ol>
                <li>Record, copy and transcribe my presentation, including oral, written and visual materials.</li>
                <li>Distribute my presentation and additional materials in PDF or or MP4/.MOV format on the
                  website of the National Recreation and Park Association of Mexico. </li>
                <li>Being photographed and/or video tapped during my presentation for advertising purposes in
                  any format (printed or electronic) for the National Recreation and Park Association of
                   Mexico and the International Congress of Urban Parks in future editions. </li>
                <li>The agreement, terms and conditions signature applies to the materials delivered
                  of my keynote or educational session in the 1st International Congress of Urban Parks,
                  and it is not limited in any way to my personal use of the materials. The ownership of
                  this presentation and materials remains with me or any other party involved. By signing
                  I also declare that my submission will not infringe any copyright, will not include any
                  material that is defamatory or scandalous, and it will not be an invasion of privacy
                  towards third parties.</li>
              </ol>
            </article>
            <article class="">
              <h5>PRIACITY NOTICE</h5>
              <p>I understand that the opinions expressed in my keynote or educational session are personal
                and not of those of the National Recreation and Park Association of Mexico. Through this, I
                 guarantee that these materials or any others prepared for this event, do not infringe any
                 copyright or violate any other rights of any person or party. I agree to keep the National
                 Recreation and Park Association of Mexico board and members free at all times against any
                 claim, liability, loss, damage, costs and expenses; including attorneys' fees, arising from
                 my personal use or the use of the National Recreation and Park Association of Mexico of the
                 materials mentioned for a violation of the previous guarantee.</p>
              <p>It is important to remember that the keynotes and educational sessions of the 1st
                International Congress of Urban Parks are not a space for promotion and/or sale of
                products and/or services. The moments for networking before or after this learning
                experience will be appropriate for those purposes.</p>
            </article>
          </div>
          <div class="row">
            <em style="font-family: 'Tangerine', cursive; font-size: 40px;">Atte. Cristina R. de León, Education and Conference Manager.  </em>
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
                                  <label for=""><strong> I accept all agreements, terms and conditions.</strong></label>
                                  <br><input type="submit" name="" value="To accept" class="button">
                                </form>
                              </div>';

                  echo $mensaje;

                }

              ?>



          </div>
        </section><br>
      </div>
    </div>
  </main>
  <footer>
    <?php include ("../conferencistas/footer.php"); ?>
  </footer>
</body>
</html>
