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
        
        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--hier al een shiv gebruiken voor html5 en wat met normalize.css?-->
    </head>
    <body id="inlog">
        <section class="wikkel">
            <header>
                <h1><span class="hoofding">Smart School</span></h1>
            </header>
            <section id="bgInloggen">
                <form id="InlogForm" method="post" action="home.php?submited=true">
                        <div class="TussenInlogForm">
                            <label for="gebruikersnaam">Gebruikersnaam
                            <input type="text" name="gebruikersnaam" value="gebruikersnaam" id="gebruikersnaam" required><br>
                            </label>
                            <label for="wachtwoord">Wachtwoord
                                <input type="password" name="wachtwoord" value="wachtwoord" id="wachtwoord" required><br>
                            </label>
                            <input class="buttonInloggen" type="submit" value="Inloggen"><br>
                            </div>
                </form>
            </section>
             </section>   
            <footer>
                <blockquote>Created by <a href="#">Niels</a>, <a href="#">Matthias</a>, <a href="#">Kevin</a> en <a href="#">Nick</a></blockquote>
            </footer>
         
    </body>
</html>


