<?php
if(!isset($_POST["rut"])){
    header("location: ../index.php");
}

$rut = $_POST["rut"];
$nombre = $_POST["nombre"];

require_once '../model/Data.php';
require_once '../model/Docente.php';

$d = new Data();

$doc = new Docente($rut, $nombre);

$resOK = $d->crearDocente($doc);

if($resOK){
    header("location: ../crearDocente.php?m=1");
}else{
    header("location: ../crearDocente.php?m=2");
}

