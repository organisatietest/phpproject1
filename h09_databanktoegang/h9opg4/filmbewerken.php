<?php
require_once("Film.php");
require_once("Filmlijst.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Films</title>
    </head>
    <body>
        <h1>Film bewerken</h1>
        <?php
        if (isset($updated))
            print("Record bijgewerkt!");
        $film = $filmLijst->getFilmById($_GET["id"]);
        ?>
        <form action="filmbewerken.php?action=verwerk&id=
<?php print($_GET["id"]); ?>" method="post">
            titel:
            <input type="text" name="titel" value="
<?php print($film->gettitel()); ?>"><br><br>
            duurtijd:
            <input type="text" name="duurtijd" value="
<?php print($film->getduurtijd()); ?>"> min<br>
            <input type="submit" value="Opslaan">
        </form>
        <br>
        <a href="overzicht.php">Terug naar overzicht</a>
    </body>
</html>