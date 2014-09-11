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
   
    <script>
        $(function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    });
    </script>
        <title>Smartschool</title>

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
                        <li><a href="">opvolging</a></li>
                        <li><a class="actief" href="">leerlingen</a></li>
                        <li><a href="">agenda</a></li>
                        <!--ouders-->
                        <li><a href="">gegevens</a></li>                     
                        <li><a href="">links</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article class="bgForm">
                    <!--hier komt de inhoud-->   
                    <!-- start form -->
                    <form method="post" action="leerlingaanmelden.php?action=process">
                        <label for="klas">klas</label>
                        <input type="text" name="klas" placeholder="1a" id="klas"><br>
                        <label for="voornaam">voornaam</label>
                        <input type="text" name="voornaam" id="voornaam"><br>
                        <label for="familienaam">familienaam</label>
                        <input type="text" name="familienaam" id="familienaam"><br>
                        <label for="datepicker">geboortedatum</label>
                        <input type="text" name="geboortedatum" id="datepicker"><br>
                        <label for="straat">straat</label>
                        <input type="text" name="straat" id="straat"><br>
                        <label for="huisnr">huisnummer</label>
                        <input type="number" name="huisnr" id="huisnr"><br>
                        <label for="bus">bus</label>
                        <input type="text" name="bus" id="bus"><br>
                        <label for="postcode">postcode</label>
                        <input type="number" name="postcode" placeholder="8431" id="postcode"><br>
                        <label for="gemeente">gemeente</label>
                        <input type="text" name="gemeente" id="gemeente"><br>
                        <label for="tel">telefoonnummer</label>
                        <input type="text" name="telefoonnr" placeholder="0561234567" id="tel"><br>
                        <label for="vnouder1">voornaam ouders</label>
                        <input type="text" name="voornaamouder1" id="vnouder1"><br>
                        <label for="fnouder1">familienaam ouders</label>
                        <input type="text" name="familienaamouder1"id="fnouder1"><br>
                        <label for="vnouder2">voornaam ouders</label>
                        <input type="text" name="voornaamouder2" id="vnouder2"><br>
                        <label for="fnouder2">familienaam ouders</label>
                        <input type="text" name="familienaamouder2" id="fnouder2"><br>
                        <label for="gsmouder1">gsm ouders</label>
                        <input type="text" name="GSMouder1" placeholder="0561234567" id="gsmouder1"><br>
                        <label for="gsmouder2">gsm ouders</label>
                        <input type="text" name="GSMouder2" placeholder="0561234567" id="gsmouder2"><br>
                        <label for="emailadresouders">emailadres voor ouder</label>
                        <input type="mail" name="emailadres" placeholder="abc123@example.com" id="emailadresouders"><br>
                        <input type="submit" value="toevoegen"><br>
                    </form>
                    <!-- einde form-->
                </article>
            </section>
        </section>   
        <footer>
            <blockquote>Created by <a href="#">Niels</a>, <a href="#">Matthias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
        </footer>

    </body>
</html>