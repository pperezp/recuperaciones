<?php
class Docente{
    public $rut;
    public $nombre;

    public function __construct($rut, $nombre){
        $this->rut = $rut;
        $this->nombre = $nombre;
    }
}
?>
