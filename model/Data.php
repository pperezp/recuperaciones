<?php
require_once("Conexion.php");

class Data{
    private $c;

    public function __construct(){
        $this->c = new Conexion("bd_recuperaciones","root","123456");
    }

    public function crearRecuperacion($rec){
        $query = "insert into recuperacion
        values(null,
        '".$rec->rut."',
        '".$rec->carrera."',
        '".$rec->asignatura."',
        '".$rec->seccion."',
        '".$rec->fechaAusenciaSQL."',
        '".$rec->motivo."',
        '".$rec->fechaRecuperacionSQL."',
        '".$rec->horario."',
        '".$rec->horas."',
        '".$rec->sala."',
        '".$rec->infoExtra."',
        now());";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getUltimoID(){
        $query = "select max(id) from recuperacion";
        $id = -1;
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        if($obj = $rs->fetch_array()){
            $id = $obj[0];
        }

        $this->c->desconectar();
        return $id;
    }

    public function getCarreras(){
        $carreras = array();
        $query = "select * from carrera order by nombre asc";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($carreras, $obj);
        }

        $this->c->desconectar();

        return $carreras;
    }

    public function getNombre($rut){
        $query = "select nombre from docente where rut = '$rut'";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        $nombre = "N/A";

        if($obj = $rs->fetch_array()){
            $nombre = $obj[0];
        }

        $this->c->desconectar();
        return $nombre;
    }
}
?>
