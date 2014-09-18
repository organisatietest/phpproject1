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
        <!--<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
        <script type="text/javascript" src="ajaxrequest.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">

        <script>
            $(document).ready(function() {
                //listens for typing on the desired field
                $("#emailadres").keyup(function() {
                    alert("hier geraak ik");
                    //gets the value of the field
                    var email = $("#emailadres").val();
                    if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", email)) {
                        //the email is available
                        $("#emailerror").html("Available");
                    }
                    else {
                        //the email is not available
                        $("#emailerror").html("Email not available");
                    }

                    //displays a loader while it is checking the database
                    $("#emailerror").html('<img alt="" src="/images/loader.gif" />');
                });
            });
        </script>



        <script>
            $(function() {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });</script>

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
                    <form id="InvoerForm" method="post" name="formaanmelden" action="leerkrachttoeveogenpresentation.php?action=process" onsubmit="return validateForm();">
                        <div class="TussenForm">
                            <label for="emailadresouders">emailadres voor ouder *
                                <input type="mail" name="emailadres" placeholder="abc123@example.com" id="emailadresouders" required>
                                <img src="/images/ajax-loader.gif" width="16" height="16" style="display:none;">
                                <span id="emailerror" class="available"></span><br>
                                <div id="rsp_email"><!-- --></div><br>
                            </label>
                            <label for="voornaam">voornaam *
                                <input type="text" name="voornaam" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_naam.checked = this.value;" id="voornaam" required><input type="checkbox" disabled name="valid_naam"><br>
                            </label>
                            <label for="familienaam">familienaam *
                                <input type="text" name="familienaam" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_fnaam.checked = this.value;" id="familienaam" required><input type="checkbox" disabled name="valid_fnaam"><br>
                            </label>
                            <label for="datepicker">geboortedatum *
                                <input type="text" name="geboortedatum" onchange="this.value = this.value.replace(/^\s+|\s+$/g, '');
                                        valid_datum.checked = this.value;" id="datepicker" required><input type="checkbox" disabled name="valid_datum"><br>
                            </label>
                            <label for="klas">klas
                                <input type="text" name="klas" placeholder="klas" id="klas"><br>
                            </label>
                            <input class="buttonToevoegen" type="submit" value="toevoegen"><br>
                        </div>
                    </form>
                    <!-- einde form-->
                </article>
            </section>
            <section class="Uitloggen">
                <a href="leerkrachtaanmelden.php?log=logout">uitloggen</a>
            </section>
        </section>   
        <footer>
            <blockquote>Created by <a href="#">Niels</a>, <a href="#">Mathias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
        </footer>

    </body>
</html>


