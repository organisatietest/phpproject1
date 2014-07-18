<?php
require_once("data/genredao.php");
$dao = new GenreDAO();
$genre = $dao->getById(1);
print("<pre>");
print_r($genre);
print("</pre>");
?>