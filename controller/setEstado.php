<?php
// clase para cambiar el estado de un docente
if(!isset($_POST["rut"])){
    header("location: ../index.php");
}

$rut = $_POST["rut"];
$estado = $_POST["estado"];

require_once '../model/Data.php';

$d = new Data();

$d->setEstadoDocente($rut, $estado);

header("location: ../views/crearDocente.php");