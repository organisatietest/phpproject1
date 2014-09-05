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
        <title>Smartschool</title>

        <link rel="stylesheet" href="css/template.css" media="screen">
        <!--hier al een shiv gebruiken voor html5 en wat met normalize.css?-->
    </head>
    <body>
        <section class="wikkel">
            <header>
                <h1>Smart School</h1>

                <nav id="hoofdmenu">
                    <ul>
                        <!--leraar-->
                        <li><a href="">opvolging</a></li>
                        <li><a href="">leerlingen</a></li>
                        <li><a href="">agenda</a></li>
                        <!--leerlingen-->
                        <li><a href="">gegevens</a></li>
                        <li><a href="">links</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article>
                    <!--hier komt de inhoud-->   
                    <!-- start form -->
                    <form method="post" action="">
                        <label for="voornaam">voornaam</label>
                        <input type="text" name="voornaam" id="voornaam"><br>
                        <label for="familienaam">familienaam</label>
                        <input type="text" name="familienaam" id="familienaam"><br>
                        <label for="geboortedatum">geboortedatum</label>
                        <input type="date" name="geboortedatum" id="geboortedatum"><br>
                        <label for="straat">straat</label>
                        <input type="text" name="straat" id="straat"><br>
                        <label for="huisnr">huisnummer</label>
                        <input type="number" name="huisnr" id="huisnr"><br>
                        <label for="bus">bus</label>
                        <input type="text" name="bus" id="bus"><br>
                        <label for="postcode">postcode</label>
                        <input type="number" name="postcode" placeholder="8431" id="postcode"><br>
                        <label for="tel">telefoonnummer</label>
                        <input type="text" name="telefoonnummer" placeholder="0561234567" id="tel"><br>
                        <label for="vnouder1">voornaam ouders</label>
                        <input type="text" name="voornaamouder1" id="vnouder1"><br>
                        <label for="fnouder1">familienaam ouders</label>
                        <input type="text" name="familienaamouder1"id="fnouder1"><br>
                        <label for="vnouder2">voornaam ouders</label>
                        <input type="text" name="voornaamouder2" id="vnouder2"><br>
                        <label for="fnouder2">familienaam ouders</label>
                        <input type="text" name="familienaamouder2" id="fnouder2"><br>
                        <label for="gsmouder1">gsm ouders</label>
                        <input type="text" name="gsmouder1" placeholder="0561234567" id="gsmouder1"><br>
                        <label for="gsmouder2">telefoonnummer</label>
                        <input type="text" name="gsmouder2" placeholder="0561234567" id="gsmouder2"><br>
                        
                        <input type="submit" value="toevoegen"><br>
                    </form>
                    <!-- einde form-->
                </article>
            </section>
            <footer>
                <blockquote>Created by Niels, Matthias, Kevin en Nick</blockquote>
            </footer>
        </section>     
    </body>
</html>