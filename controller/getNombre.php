<?php
require_once("../model/Data.php");
setlocale(LC_CTYPE,"es_ES");

$rut = trim(str_replace(".","",$_POST["rut"]));

$d = new Data();

$nombre = $d->getNombre($rut);
echo $nombre;
?>
