<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <title>Smartschool > Klaslijst</title>

        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--hier al een shiv gebruiken voor html5 en wat met normalize.css?-->
    </head>
    <body>
        <section class="wikkel">
            <header>
                <h1><span class="hoofding">Smart School</span></h1>

                <nav class="hoofdmenu">
                    <ul>
                        <!--leraar-->
                        <li><a href="leerkrachtaanmelden.php">Leerkracht</a></li>
                        <li><a href="aanwezigheden.php">Opvolging</a></li>
                        <li><a class="actief" href="klaslijst.php">leerlingen</a>
                            <ul>
                                <li><a class="actief" href="klaslijst.php">Klaslijst</a></li>
                                <li><a  href="leerlingaanmelden.php">Leerlingen toevoegen</a></li>
                            </ul>
                        </li>
                        <li><a href="">agenda</a></li>
                        <li><a class="uitlog" href="klaslijst.php?log=logout">uitloggen</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article class="bgKlaslijst">
                    <!--hier komt de inhoud-->  

                    <img id="doodle" src="images/arrow.png" alt="arrow"/>
                    <h3 id="KL">Klaslijst bekijken</h3>
                    <div class="klaslijst"><!--omvatende div die de klaslijst heeft als inhoud-->

                        <?php foreach ($klaslijst as $leerling) { ?>
                            <div class="passpoort"><!--repeterende div die voor iedere leerling van de klas herhaald wordt-->
                                <img src="Foto_leerling/defaul_foto.png" alt="default" style="width:100px;height:100px"><br/>
                                <b>Voornaam</b>: <?php echo " ", $leerling->getVoornaam(); ?><br/>
                                <b>Familienaam</b>: <?php echo " ", $leerling->getFamilienaam(); ?><br/>
                                <b>Geboortedatum</b>: <?php echo " ", $leerling->getGeboortedatum(); ?><br/>
                                <a href="klaslijst.php?del=yes&id=<?php echo $leerling->getLeerlingid(); ?>">delete</a>
                                <span>&nbsp;</span>
                                <a href="leerlingprofiel.php?update=yes&leerlingid=<?php echo $leerling->getLeerlingid(); ?>">update</a>
                            </div><!--einde reeterende div-->
                        <?php } ?>
                    </div><!--einde omvatende div-->
                </article>
            </section>
        </section>   
        <footer>
            <blockquote>Created by <a href="#">Niels</a>, <a href="#">Mathias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
        </footer>
        <script type="text/javascript" charset="utf-8">

            $(function() {
                $('body').hide().show();
            });
        </script>
    </body>
</html>
