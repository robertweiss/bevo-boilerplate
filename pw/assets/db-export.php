<?php
// Script im site/assets/-Ordner speichern und nach dem jeweiligen Projekt und Endung -export.php benennen
include("../../index.php");

$name = $wire->config->dbName;
$user = $wire->config->dbUser;
$pass = $wire->config->dbPass;

$mysqldump = exec("which mysqldump");

$dateiname = basename(__FILE__, '-export.php');
$datei = "db-".$dateiname.".sql";

exec("'$mysqldump' -u'$user' -p'$pass' '$name' > '$datei'");

if (file_exists("./".$datei) && filesize("./".$datei) > 100) {
    echo $datei." wurde erstellt\n";
} else {
    echo $datei." konnte nicht erstellt werden\n";
}

?>