<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 
Javascript dat gebruikt wordt in de webpagina
-->
        <script src="js/modernizr.custom.42943.js"></script>
<!--
CSS dat gebuikt wordt in de webpagina
-->
        <link rel="stylesheet" href="css/style.css" media="screen">
        <title>Smartschool > Welkom</title>
    </head>
<!--
id wordt hier gebruikt doordat de body van het inlogscherm er anders uitziet dan de rest van deze website
-->
    <body id="inlog">
<!--
section container rond de hele webpagina
-->
        <section class="wikkelInlog">
<!--
Header met naam van website 
-->
            <header>
                <h1><span class="hoofding">Smart School</span></h1>
            </header>
<!--
einde header, begin van section voor achtergrond inlogformulier
-->
            <section id="bgInloggen">
                <h2 class="WelkomAni"><span class="Welkom">Welkom</span></h2>
<!--
begin van het inlogformulier
-->
                <form id="InlogForm" method="post" action="home.php?submited=true">
                        <div class="TussenInlogForm">
                                <label for="gebruikersnaam">Gebruikersnaam
                                    <input type="text" name="gebruikersnaam"  id="gebruikersnaam" required><br>
                                </label>
                                <label for="wachtwoord">Wachtwoord
                                    <input type="password" name="wachtwoord"  id="wachtwoord" required><br>
                                </label>
                            <div class="opmaakInlogKnop">
                                    <input class="buttonInloggen" type="submit" value="Inloggen"><br>
                            </div>
                        </div>
                </form>
<!--
Einde van het inlogformulier
-->
            </section>
        </section>
<!--
Einde van de container en begin van footer
-->
        <footer class="IndexFooter">
            <blockquote>
               Created by 
               <a href="#">Niels</a>,
               <a href="#">Mathias</a>, 
               <a href="#">Kevin</a> en 
               <a href="#">Nick</a>
            </blockquote>
        </footer>
    </body>
</html>


