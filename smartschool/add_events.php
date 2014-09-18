<?php
require_once("data/dbconfig.php");
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// connexion à la base de données
try {
    $bdd = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}

$sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, :end)";
$q = $bdd->prepare($sql);
$q->execute(array(':title' => $title, ':start' => $start, ':end' => $end));

?>