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
                    changeYear: true,
                    yearRange: "-100:+0"
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
         <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
<!--
CSS dat gebuikt wordt in de webpagina
-->
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/style.css" media="screen">
        
        <title>Smartschool > Leerlingen toevoegen</title>
    </head>
    <body>
        <section class="wikkel">
                        <script>
        jQuery(document).ready(function ($) {

            var _CaptionTransitions = [];
            _CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
            _CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["RTT|2"] = { $Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5} };
            _CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 15, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
            _CaptionTransitions["MCLIP|L"] = { $Duration: 900, $Clip: 1, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
            _CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };

            var options = {
                $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 0,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: false,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                 $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                },
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="position: absolute; margin: 0 auto;
        top: 0px; left: 0px; width: 100%; min-height: 100%; overflow: hidden; z-index: -1;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; min-width: 100%;
            min-height: 35%;max-height: 35%; overflow: hidden;">
            <div>
                <img u="image" src="images/1920/bg1.png" />

            </div>
            <div>
                <img u="image" src="images/1920/bg2.png" />
            </div>
            <div>
                <img u="image" src="images/1920/bg3.png" />
            </div>
            <div>
                <img u="image" src="images/1920/bg4.png" />
            </div>
            <div>
                <img u="image" src="images/1920/bg5.png" />
            </div>
            <div>
                <img u="image" src="images/1920/bg6.png" />
            </div>
            <div>
                <img u="image" src="images/1920/bg7.png" />
            </div>
        </div>
                
    </div>
    <!-- Jssor Slider End -->
<!--
headet met naam van website + hoofdmenu
-->
            <header>
                <h1><span class="hoofding">Smart School</span></h1>
 <!--
begin hoofdmenu leerkracht
-->
                <nav class="hoofdmenu">
                    <ul>
                        <li><a class="test" href="aanwezigheden.php">Aanwezigheden</a></li>
                        <li><a class="actief" href="klaslijst.php">leerlingen</a></li>
                        <li><a href="default.html">agenda</a></li>
                        <li><a href="#">Punten</a></li>
                    </ul>
                </nav>
<!--
Einde hoofdmenu leerkrachten
-->
            </header>
<!--
Einde header, begin section voor inhoud webpagina
-->
<a class="uitlog" href="klaslijst.php?log=logout">klik hier om af te melden</a>
                            
            <section class="OnderkantWeb">
<!--
mouse pointer image
-->
<div class="submenu">
    <ul>
        <li><a href="klaslijst.php">Klaslijst</a></li>
        <li><a class="SubActief" href="leerlingaanmelden.php">Leerling toevoegen</a></li>
    </ul>
</div> 
<!--
Hier is de titel van de webpagina
-->
                    <h3>Invoeren van gegevens leerling</h3>
<!--
Het formulier van de webpagina
-->
                    <form class="InvoerForm" method="post" name="formaanmelden" action="leerlingaanmelden.php?action=process" onsubmit="return validateForm();">
<!--
stuk van formulier wordt links geplaatst
-->              
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
<!--
Einde div + stuk van formulier wordt rechts geplaatst
-->
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
<!--
Einde div
-_>
                            <div id="rsp_email"><!-- --></div><br>
                            <input class="buttonToevoegen" type="submit" 
                                   value="toevoegen"><br>
                    </form>
<!--
einde form
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