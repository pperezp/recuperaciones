<?php
require_once("../model/Data.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$d = new Data();

$carreras = $d->getCarreras();

foreach ($carreras as $c) {
    echo $c->id."-".$c->nombre."<br>";
}
?>
