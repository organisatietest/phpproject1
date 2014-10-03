<?php
require_once("Film.php");
require_once("Filmlijst.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>films</title>
    </head>
    <body>
        <h1>alle films</h1>
        <?php
        $tab = $filmLijst->getLijst();
        ?>
        <ul>
            <?php
            foreach ($tab as $film) {
                $filmNaam= $film->gettitel();
                $filmID= $film->getID();
                print("<li>" . $filmNaam . "   (<a href=\"overzicht.php?action=verwijder&id="
                        . $filmID . "\">verwijderen/</a><a href=\"filmbewerken.php?id="
                        . $filmID . "\">bewerken</a>)</li>");
            }
            ?>
        </ul>
        <h1>Film toevoegen</h1>
        <form action="overzicht.php?new=true" method="post">
            titel :
            <input type="text" name="filmnaam"><br>
            duurtijd:
            <input type="text" name="tijd">minuten<br>
            <input type="submit" value="toevoegen">
        </form>
    </body>
</html>