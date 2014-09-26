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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
  
        <title>Smartschool > Leerkrachten</title>

        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--hier al een shiv gebruiken voor html5 en wat met normalize.css?-->
    </head>
    <body>
        <section class="wikkel">
            <header>
                <h1><span class="hoofding">Smart School</span></h1>

                <nav class="StyleAdmin">
                    <h4>Menu</h4><img id="MenuIcon" src="images/menuIcon.png" alt="menuIcon.png"/>
                    <ul>
                        <!--leraar-->
                        <li><a class="actief" href="leerkrachtlijst.php">Leerkracht<img id="LeerkrachtIcon" src="images/leerkrachtIcon.png" alt="leerkrachtIcon.png"/></a>
                            
                                <ul>
                                <li><a class="actief" href="leerkrachtlijst.php">Lijst van alle leerkrachten</a></li>
                                <li><a  href="leerkrachtaanmelden.php">Leerkrachten toevoegen</a></li>
                            </ul>
                           
                        </li>
                        <li><a class="uitlog" href="leerkrachtlijst.php?log=logout">uitloggen<img id="closeIcon" src="images/closeIcon.png" alt="UitlogIcon.png"/></a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article class="bgKlaslijst">
                    <!--hier komt de inhoud-->  
                    <img id="doodle" src="images/arrow.png" alt="arrow"/>
                    <h3 id="LL">Leerkrachten</h3>
                    <div class="klaslijst"><!--omvatende div die de klaslijst heeft als inhoud-->
                        <?php foreach ($leerkrachtlijst as $leerkracht){ ?>
                        <div class="passpoort"><!--repeterende div die voor iedere leerling van de klas herhaald wordt-->
                            <img src="Foto_leerling/defaul_foto.png" alt="default" style="width:100px;height:100px"><br/>
                            <b>Voornaam</b>: <?php echo " ",$leerkracht->getVoornaam(); ?><br/>
                            <b>Familienaam:</b> <?php echo " ",$leerkracht->getFamilienaam(); ?><br/>
                            <b>Geboortedatum:</b> <?php echo " ",$leerkracht->getGeboortedatum(); ?><br/>
                            <b>Klas:</b> <?php echo " ",$leerkracht->getKlasid(); ?><br/>
                        </div><!--einde reeterende div-->
                        <?php } ?>
                    </div><!--einde omvatende div-->
                </article>
            </section>
        </section>   
        <footer>
            <blockquote>Created by <a href="#">Niels</a>, <a href="#">Mathias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
        </footer>
    </body>
</html>
