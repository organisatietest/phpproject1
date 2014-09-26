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
        <script type="text/javascript" src="ajaxrequest.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">

        <script>
            $(document).ready(function() {
                //listens for typing on the desired field
                $("#emailadres").keyup(function() {
                    //gets the value of the field
                    var email = $("#emailadres").val();
                    var atpos = email.indexOf("@");
                    var dotpos = email.lastIndexOf(".");
                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                        $("#emailerror").html("email not validate");
                    }
                    else {
                        //the email is not available
                        $("#emailerror").html("email is validate");
                        var valid_email = true;
                    }
                });
                $(document).click(function() {
                   var valid_naam = $("#voornaam").val();
                   var valid_fnaam = $("#familienaam").val();
                   var valid_datum = $("#datepicker").val();
                   var email = $("#emailadres").val();
                   var atpos = email.indexOf("@");
                    var dotpos = email.lastIndexOf(".");
                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                        $("#emailerror").html("email not validate");
                    }
                    else {
                        //the email is not available
                        $("#emailerror").html("email is validate");
                        var valid_email = true;
                    }
                   if (!empty(valid_naam) || !empty(valid_fnaam) || !empty(valid_datum || valid_email === true)){
                   }
                });
            });
        </script>
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>

        <script>
            function validateForm() {
                var x = document.forms["formaanmelden"]["emailadres"].value;
                var atpos = x.indexOf("@");
                var dotpos = x.lastIndexOf(".");
                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                    alert("Not a valid e-mail address");
                    return false;
                }
                var x = document.forms["formaanmelden"]["voornaam"].value;
                if (x == null || x == "") {
                    alert("voornaam moet ingevult worden");
                    return false;
                }
                var x = document.forms["formaanmelden"]["familienaam"].value;
                if (x == null || x == "") {
                    alert("familienaam moet ingevult worden");
                    return false;
                }
                var x = document.forms["formaanmelden"]["geboortedatum"].value;
                if (x == null || x == "") {
                    alert("First name must be filled out");
                    return false;
                }
            }
        </script>
        <title>Smartschool > leerlingen toevoegen</title>

        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--hier al een shiv gebruiken voor html5 en wat met normalize.css?-->
    </head>
    <body>
        <section class="wikkelLeerlingToevoegen">
            <header>
                <h1><span class="hoofding">Smart School</span></h1>
                <nav>
                    <h4>Menu</h4><img id="MenuIcon" src="images/menuIcon.png" alt="menuIcon.png"/>
                    <ul>
                        <!--leraar-->
                        <li><a href="aanwezigheden.php">Aanwezigheden<img id="AanwezigheidIcon" src="images/aanwezigheidIcon.png" alt="aanwezigheidIcon.png" /></a></li>
                        <li><a class="actief" href="klaslijst.php">leerlingen<img id="LeerlingIcon" src="images/leerlingIcon.png" alt="leerlingIcon.png" /></a>
                            <ul>
                                <li><a href="klaslijst.php">Klaslijst</a></li>
                                <li><a class="actief"  href="leerlingaanmelden.php">Leerlingen toevoegen</a></li>
                            </ul>
                        </li>
                        <li><a href="default.html">agenda<img src="images/agendaIcon.png" alt="agendaIcon.png" /></a></li>
                        <li><a class="uitlog" href="leerlingaanmelden.php?log=logout">uitloggen<img id="closeIcon" src="images/closeIcon.png" alt="UitlogIcon.png"/></a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article class="bgForm">
                    <img id="doodle" src="images/arrow.png" alt="arrow"/>
                    <!--hier komt de inhoud-->   
                    <!-- start form -->
                    <h3>Invoeren van gegevens leerling</h3>
                    <form class="InvoerForm" method="post" name="formaanmelden" action="leerlingaanmelden.php?action=process" onsubmit="return validateForm();">
                        <div class="TussenForm FormLinks">
                            <label  for="voornaam">voornaam *
                                <input type="text" name="voornaam" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                    valid_naam.checked = this.value;" id="voornaam" required><input  class="verwijderen" type="checkbox" disabled name="valid_naam"><span class="juist"></span><br>
                            </label>
                            <label for="familienaam">familienaam *
                                <input type="text" name="familienaam" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_fnaam.checked = this.value;" id="familienaam" required><input  class="verwijderen" type="checkbox" disabled name="valid_fnaam"><span class="juist"></span><br>
                            </label>
                            <label for="datepicker">geboortedatum *
                                <input type="text" name="geboortedatum" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_datum.checked = this.value;" id="datepicker" required><input class="verwijderen" type="checkbox" disabled name="valid_datum"><span class="juist"></span><br>
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
                        </div>
                        <div class="TussenForm FormRechts">
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
                            <label for="emailadres">emailadres voor ouder *
                                <input type="mail" name="emailadres" placeholder="abc123@example.com" id="emailadres" autocomplete="off" required>
                                <span id="emailerror" class="available"></span><br>
                            </label>
                            </div>
                            <div id="rsp_email"><!-- --></div><br>
                            <input class="buttonToevoegen" type="submit" 
                                   value="toevoegen"><br>
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
