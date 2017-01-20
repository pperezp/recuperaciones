<?php
require_once './model/Data.php';

$d = new Data();
$rut = trim(str_replace(".","",$_POST["rut"]));

if(!isset($rut)){
    header("location: index.php");
}else{
    $docente = $d->getDocente($rut);
    
    if($docente == null){
        header("location: index.php?e=1&rut=$rut");
    }else if(!$docente->activo){
        header("location: index.php?e=2&nombre=$docente->nombre");
    }else{
        // docente activo
        session_start();
        $_SESSION["rut"] = $rut;
        $_SESSION["nombre"] = $docente->nombre;
        
        header("location: peticionBootstrap.php");
    }
    
    
}



