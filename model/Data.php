<?php
require_once("Conexion.php");
require_once("DatosReporte.php");
setlocale(LC_CTYPE,"es_ES");

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

        echo $query;

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

    public function getFechaCreacion($id){
        $query = "select fecha from recuperacion where id = '$id'";
        $fecha = -1;
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        if($obj = $rs->fetch_array()){
            $fecha = $obj[0];
        }

        $this->c->desconectar();
        return $fecha;
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

    public function getDocentes(){
        $docentes = array();
        $query = "select * from docente order by nombre asc";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($docentes, $obj);
        }

        $this->c->desconectar();

        return $docentes;
    }
    
    public function getDocentesByFiltro($filtro){
        $docentes = array();
        $query = "select * from docente where rut like '%$filtro%' or nombre like '%$filtro%' order by nombre asc";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($docentes, $obj);
        }

        $this->c->desconectar();

        return $docentes;
    }

    public function getRecuperaciones($rut){
        $recuperaciones = array();
        $query = "select * from recuperacion where docente = '$rut' order by fecha desc";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($recuperaciones, $obj);
        }

        $this->c->desconectar();

        return $recuperaciones;
    }

    public function getRecuperacion($id){
        $query = "select * from recuperacion where id = '$id'";
        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        $dr = new DatosReporte();

        if($obj = $rs->fetch_array()){
            $dr->id = $obj[0];
            $dr->rut = $obj[1];
            $dr->carrera = $obj[2];
            $dr->asignatura = $obj[3];
            $dr->seccion = $obj[4];
            $dr->fechaAusencia = $obj[5];
            $dr->motivo = $obj[6];
            $dr->fechaRecuperacion = $obj[7];
            $dr->horario = $obj[8];
            $dr->horas = $obj[9];
            $dr->sala = $obj[10];
            $dr->infoExtra = $obj[11];
            $dr->fecha = $obj[12];
        }

        $this->c->desconectar();

        return $dr;
    }

}
?>
