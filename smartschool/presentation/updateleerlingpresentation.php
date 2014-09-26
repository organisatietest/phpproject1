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
                        <li><a href="">Leerkracht</a></li>
                        <li><a href="">Opvolging</a></li>
                        <li><a class="actief" href="">leerlingen</a>
                            <ul>
                                <li><a href="klaslijst.php">Klaslijst</a></li>
                                <li><a href="leerlingaanmelden.php">Leerlingen toevoegen</a></li>
                            </ul>
                        </li>
                        <li><a href="">agenda</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <article class="bgForm">
                    <!--hier komt de inhoud-->   
                    <!-- start form -->
                    <form class="InvoerForm" method="post" name="formaanmelden" action="leerlingprofiel.php?update=yes&action=process&leerlingid=<?php echo $leerling->getLeerlingid();?>" onsubmit="return validateForm();">
                        <div class="TussenForm">
                            <label class="In"  for="voornaam">voornaam *
                                <input type="text" name="voornaam" value="<?php echo $leerling->getVoornaam(); ?>" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                    valid_naam.checked = this.value;" id="voornaam" required><input type="checkbox" disabled name="valid_naam"><span class="juist"></span><br>
                            </label>
                            <label class="In" for="familienaam">familienaam *
                                <input type="text" name="familienaam" value="<?php echo $leerling->getFamilienaam(); ?>" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_fnaam.checked = this.value;" id="familienaam" required><input type="checkbox" disabled name="valid_fnaam"><span class="juist"></span><br>
                            </label>
                            <label class="In" for="datepicker">geboortedatum *
                                <input type="text" name="geboortedatum" value="<?php echo $leerling->getGeboortedatum(); ?>" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_datum.checked = this.value;"  id="datepicker" required><input type="checkbox" disabled name="valid_datum"><span class="juist"></span><br>
                            </label>
                            <label for="straat">straat
                                <input type="text" name="straat" value="<?php echo $leerling->getStraat(); ?>" id="straat"><br>
                            </label>
                            <label for="huisnr">huisnummer
                                <input type="number" name="huisnr" value="<?php if($leerling->getHuisnr() == 0){/*niks*/}else{echo $leerling->getHuisnr();} ?>" id="huisnr"><br>
                            </label>
                            <label for="bus">bus
                                <input type="text" name="bus" value="<?php echo $leerling->getBus(); ?>" id="bus"><br>
                            </label>
                            <label for="postcode">postcode
                                <input type="number" name="postcode" value="<?php if($leerling->getPostcode() == 0){/*niks*/}else{echo $leerling->getPostcode();} ?>" placeholder="8431" id="postcode"><br>
                            </label>
                            <label for="gemeente">gemeente
                                <input type="text" name="gemeente" value="<?php //echo $leerling->getFamilienaam(); ?>" id="gemeente"><br>
                            </label>
                            <label for="tel">telefoonnummer
                                <input type="text" name="telefoonnr" value="<?php if($leerling->getTelefoonnr() == 0){/*niks*/}else{echo $leerling->getTelefoonnr();}?>" placeholder="0561234567" id="tel"><br>
                            </label>
                            <label for="vnouder1">voornaam ouder 1
                                <input type="text" name="voornaamouder1" value="<?php echo $leerling->getVoornaamouder1(); ?>" id="vnouder1"><br>
                            </label>
                            <label for="fnouder1">familienaam ouder1
                                <input type="text" name="familienaamouder1" value="<?php echo $leerling->getFamilienaamouder1(); ?>" id="fnouder1"><br>
                            </label>
                            <label for="gsmouder1">gsm ouder 1
                                <input type="text" name="GSMouder1" value="<?php if($leerling->getGSMouder1() == 0){/*niks*/}else{echo $leerling->getGSMouder1();} ?>" placeholder="0561234567" id="gsmouder1"><br>
                            </label>
                            <label for="vnouder2">voornaam ouder 2
                                <input type="text" name="voornaamouder2" value="<?php echo $leerling->getVoornaamouder2(); ?>" id="vnouder2"><br>
                            </label>
                            <label for="fnouder2">familienaam ouder 2
                                <input type="text" name="familienaamouder2" value="<?php echo $leerling->getFamilienaamouder2(); ?>" id="fnouder2"><br>
                            </label>
                            <label for="gsmouder2">gsm ouder 2
                                <input type="text" name="GSMouder2" value="<?php if($leerling->getGSMouder2() == 0){/*niks*/}else{echo $leerling->getGSMouder2();}?>" placeholder="0561234567" id="gsmouder2"><br>
                            </label>
                            <label for="emailadres">emailadres voor ouder *
                                <input type="mail" name="emailadres" value="<?php echo $leerling->getEmailadres(); ?>" placeholder="abc123@example.com" id="emailadres" autocomplete="off" required>
                                <span id="emailerror" class="available"></span><br>
                            <!--</label>
                            <label for="wachtwoord">wachtwoord *
                                <input type="password" name="wachtwoord" value="<?php //echo $leerling->getWachtwoord(); ?>" placeholder="" id="wachtwoord" autocomplete="off" required>
                            </label>-->
                            <div id="rsp_email"><!-- --></div><br>
                            <input class="buttonToevoegen" type="submit" 
                                   value="bijwerken"><br>
                        </div>
                    </form>
                    <!-- einde form-->
                </article>
            </section>
            <section class="Uitloggen">
                <a href="leerlingaanmelden.php?log=logout">uitloggen</a>
            </section>
            <section class="SideImages">
                <img class="SideImageLeft" src="../images/sideImageA.jpg" alt=""/>
                <img class="SideImageRight" src="../images/sideImageB.jpg" alt=""/>
                <img class="SideImageLeft" src="../images/sideImageC.jpg" alt=""/>
            </section>
        </section>   
        
        <footer>
            <blockquote>Created by <a href="#">Niels</a>, <a href="#">Mathias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
        </footer>

    </body>
</html>
