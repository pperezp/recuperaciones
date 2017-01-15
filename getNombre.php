<?php
require_once("model/Data.php");

$rut = trim(str_replace(".","",$_POST["rut"]));

$d = new Data();

$nombre = $d->getNombre($rut);
echo $nombre;
?>
