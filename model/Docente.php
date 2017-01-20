<?php
class Docente{
    public $rut;
    public $nombre;
    public $activo;

    public function __construct($rut, $nombre, $activo){
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->activo = $activo;
    }
}
?>
