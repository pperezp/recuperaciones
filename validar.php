<?php
require_once './model/Data.php';

$d = new Data();
$rut = trim(str_replace(".","",$_POST["rut"]));

if(!isset($rut)){
    header("location: index.php");
}else{
    $nombre = $d->getNombre($rut);
    
    if($nombre != "N/A"){
        session_start();
        $_SESSION["rut"] = $rut;
        $_SESSION["nombre"] = $nombre;
        
        header("location: peticionBootstrap.php");
    }else{
        header("location: index.php?e=1&rut=$rut");
    }
}



