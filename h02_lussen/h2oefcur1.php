<?php
class Book {
public function getTitle() {
$title = "Handleiding HTML";
return $title;
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Boeken</title>
</head>
<body>
<h1>
<?php
$boek = new Book();
print($boek->getTitle());
?>
</h1>
</body>
</html>