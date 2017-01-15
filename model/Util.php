<?php
class Util{

    public function __construct(){
        // Constructor
    }

    public function showErrors(){
        // Para que muestre los errores en PHP
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    public function setLocaleEs(){
        setlocale(LC_CTYPE,"es_ES");
    }

    public function pasarMayusculas($cadena) {
        $cadena = strtoupper($cadena);
        $cadena = str_replace("á", "Á", $cadena);
        $cadena = str_replace("é", "É", $cadena);
        $cadena = str_replace("í", "Í", $cadena);
        $cadena = str_replace("ó", "Ó", $cadena);
        $cadena = str_replace("ú", "Ú", $cadena);
        $cadena = str_replace("ñ", "Ñ", $cadena);
        return ($cadena);
    }

    public function pasarMinusculas($cadena) {
        $cadena = strtolower($cadena);
        $cadena = str_replace("Á", "á", $cadena);
        $cadena = str_replace("É", "é", $cadena);
        $cadena = str_replace("Í", "í", $cadena);
        $cadena = str_replace("Ó", "ó", $cadena);
        $cadena = str_replace("Ú", "ú", $cadena);
        $cadena = str_replace("Ñ", "ñ", $cadena);
        return ($cadena);
    }

    public function getMes($mesPalabra){
        if($mesPalabra == "ENERO"){
            return 1;
        }else if($mesPalabra == "FEBRERO"){
            return 2;
        }else if($mesPalabra == "MARZO"){
            return 3;
        }else if($mesPalabra == "ABRIL"){
            return 4;
        }else if($mesPalabra == "MAYO"){
            return 5;
        }else if($mesPalabra == "JUNIO"){
            return 6;
        }else if($mesPalabra == "JULIO"){
            return 7;
        }else if($mesPalabra == "AGOSTO"){
            return 8;
        }else if($mesPalabra == "SEPTIEMBRE"){
            return 9;
        }else if($mesPalabra == "OCTUBRE"){
            return 10;
        }else if($mesPalabra == "NOVIEMBRE"){
            return 11;
        }else if($mesPalabra == "DICIEMBRE"){
            return 12;
        }
    }

    public function getFechaFormateadaConHora($fecha){
        list($fec, $hor) = explode(" ", $fecha);

        $fec = $this->getFechaFormateada($fec);

        return $fec . " A LAS " . $hor;
    }

    /*La fecha llegará como formato SQL (sin hora)*/
    public function getFechaFormateada($fecha){
        list($anio, $mes, $dia) = explode('-', $fecha);

        $mesPalabra = "";

        switch ($mes) {
            case 1:
                $mesPalabra = " DE ENERO DE ";
                break;
            case 2:
                $mesPalabra = " DE FEBRERO DE ";
                break;
            case 3:
                $mesPalabra = " DE MARZO DE ";
                break;
            case 4:
                $mesPalabra = " DE ABRIL DE ";
                break;
            case 5:
                $mesPalabra = " DE MAYO DE ";
                break;
            case 6:
                $mesPalabra = " DE JUNIO DE ";
                break;
            case 7:
                $mesPalabra = " DE JULIO DE ";
                break;
            case 8:
                $mesPalabra = " DE AGOSTO DE ";
                break;
            case 9:
                $mesPalabra = " DE SEPTIEMBRE DE ";
                break;
            case 10:
                $mesPalabra = " DE OCTUBRE DE ";
                break;
            case 11:
                $mesPalabra = " DE NOVIEMBRE DE ";
                break;
            case 12:
                $mesPalabra = " DE DICIEMBRE DE ";
                break;

        }

        return $dia.$mesPalabra.$anio;
    }
}
?>
