<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 
Javascript dat gebruikt wordt in de webpagina
-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <script src="js/modernizr.custom.42943.js"></script>
<!--
CSS dat gebuikt wordt in de webpagina
-->
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/style.css" media="screen">
        
        <title>Smartschool > Update leerlingprofiel</title>
    </head>
    <body>
        <section class="wikkel">
<!--
Het met naam van website + hoofdmenu
-->
            <header>
                <h1><span class="hoofding">Smart School</span></h1>
<!--
begin hoofdmenu leerkracht
-->
                <nav class="hoofdmenu">
                    <h4>Menu</h4><img id="MenuIcon" src="images/menuIcon.png" alt="menuIcon.png"/>
                        <ul>
                            <li>
                                <a href="aanwezigheden.php">Aanwezigheden<img id="AanwezigheidIcon" src="images/aanwezigheidIcon.png" alt="aanwezigheidIcon.png" /></a>
                            </li>
                            <li>
                                <a class="actief" href="klaslijst.php">leerlingen<img id="LeerlingIcon" src="images/leerlingIcon.png" alt="leerlingIcon.png" /></a>
                                    <ul>
                                        <li>
                                            <a href="klaslijst.php">Klaslijst</a>
                                        </li>
                                        <li>
                                            <a href="leerlingaanmelden.php">Leerlingen toevoegen</a>
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                <a  href="default.html">agenda<img src="images/agendaIcon.png" alt="agendaIcon.png" /></a>
                            </li>
                            <li>
                                <a class="uitlog" href="klaslijst.php?log=logout">uitloggen<img id="closeIcon" src="images/closeIcon.png" alt="UitlogIcon.png"/></a>
                            </li>
                        </ul>
                </nav>
<!--
Einde hoofdmenu leerkrachten
-->
            </header>
<!--
Einde header, begin section voor inhoud webpagina
-->
            <section class="bgKlaslijst">
<!--
omvatende div die de klaslijst heeft als inhoud
-->
                    <div class="klaslijst">
<!--
repeterende div die voor iedere leerling van de klas herhaald wordt
-->
                        <div class="passpoort">
                            <img src="Foto_leerling/defaul_foto.png" alt="default" style="width:100px;height:100px"><br/>
                            <b>Voornaam</b>: <?php echo " ",$leerling->getVoornaam(); ?><br/>
                            Familienaam: <?php echo " ",$leerling->getFamilienaam(); ?><br/>
                            Geboortedatum: <?php echo " ",$leerling->getGeboortedatum(); ?><br/>
                        </div>
<!--
einde reeterende div
-->  
                    </div>   
<!--
einde omvatende div
-->
            </section>
<!--
Einde section voor inhoud
-->
        </section> 
<!--
Einde section, begin van footer
-->
        <footer>
            <blockquote>
                Created by 
                <a href="#">Niels</a>, 
                <a href="#">Mathias</a>, 
                <a href="#">Kevin</a> en 
                <a href="#">Nick</a>
            </blockquote>
        </footer>
<!--
Einde footer
-->
    </body>
</html>
