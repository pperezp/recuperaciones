<?php
if(!isset($_POST["rut"])){
    header("location: ../index.php");
}

$rut = $_POST["rut"];
$estado = $_POST["estado"];

require_once '../model/Data.php';

$d = new Data();

$d->setEstadoDocente($rut, $estado);

header("location: ../crearDocente.php");