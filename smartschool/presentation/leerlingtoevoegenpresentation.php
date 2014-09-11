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
        <section class="wikkelLeerlingToevoegen">
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
            <img class="verfvlek" src="images/verfvlek.png" alt="verfvlek" />
            <section>
                <article class="bgForm">
                    <!--hier komt de inhoud-->   
                    <!-- start form -->
                    <form id="InvoerForm" method="post" action="leerlingaanmelden.php?action=process">
                        <div class="TussenForm">
                            <label for="voornaam">voornaam *
                            <input type="text" name="voornaam" id="voornaam" required><br>
                            </label>
                            <label for="familienaam">familienaam *
                            <input type="text" name="familienaam" id="familienaam" required><br>
                            </label>
                            <label for="datepicker">geboortedatum *
                            <input type="text" name="geboortedatum" id="datepicker" required><br>
                        </label>
                            <label for="straat">straat
                            <input type="text" name="straat" id="straat"><br>
                        </label>
                            <label for="huisnr">huisnummer
                            <input type="number" name="huisnr" id="huisnr"><br>
                        </label>
                            <label for="bus">bus
                            <input type="text" name="bus" id="bus"><br>
                        </label>
                            <label for="postcode">postcode
                            <input type="number" name="postcode" placeholder="8431" id="postcode"><br>
                        </label>
                            <label for="gemeente">gemeente
                            <input type="text" name="gemeente" id="gemeente"><br>
                        </label>
                            <label for="tel">telefoonnummer
                            <input type="text" name="telefoonnr" placeholder="0561234567" id="tel"><br>
                        </label>
                            <label for="vnouder1">voornaam ouder 1
                            <input type="text" name="voornaamouder1" id="vnouder1"><br>
                        </label>
                            <label for="fnouder1">familienaam ouder1
                            <input type="text" name="familienaamouder1" id="fnouder1"><br>
                        </label>
                            <label for="gsmouder1">gsm ouder 1
                            <input type="text" name="GSMouder1" placeholder="0561234567" id="gsmouder1"><br>
                        </label>
                            <label for="vnouder2">voornaam ouder 2
                            <input type="text" name="voornaamouder2" id="vnouder2"><br>
                        </label>
                            <label for="fnouder2">familienaam ouder 2
                            <input type="text" name="familienaamouder2" id="fnouder2"><br>
                        </label>
                            <label for="gsmouder2">gsm ouder 2
                            <input type="text" name="GSMouder2" placeholder="0561234567" id="gsmouder2"><br>
                        </label>
                            <label for="emailadresouders">emailadres voor ouder *
                            <input type="mail" name="emailadres" placeholder="abc123@example.com" id="emailadresouders" required><br>
                        </label>
                            <input class="buttonToevoegen" type="submit" value="toevoegen"><br>
                            </div>
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
