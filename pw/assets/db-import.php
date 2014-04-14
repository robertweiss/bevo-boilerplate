<?php
// Script im site/assets/-Ordner speichern und nach dem jeweiligen Projekt und Endung -import.php benennen
include("../../index.php");

$name = $wire->config->dbName;
$user = $wire->config->dbUser;
$pass = $wire->config->dbPass;

$dateiname = basename(__FILE__, '-import.php');
$datei = "db-".$dateiname.".sql";

exec("mysql -u'$user' -p'$pass' '$name' < '$datei'");

echo $datei." wurde importiert\n";

?>