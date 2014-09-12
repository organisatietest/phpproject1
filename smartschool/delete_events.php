<?php
$id=$_POST['id'];


//$id is juist, werkt, kan dan maar de sql
//echo $id;

// connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=smartschool', 'root', '');
 } catch(Exception $e) {
 exit('Impossible de se connecter à la base de données.');
 }
 
$sql = "delete from evenement WHERE id=?";
$q = $bdd->prepare($sql);
$q->execute(array($id));
?>
