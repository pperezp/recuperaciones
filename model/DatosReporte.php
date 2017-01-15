<?php
class DatosReporte{
    public $id;
    public $docente;// nombre
    public $rut;
    public $carrera;
    public $asignatura;
    public $seccion;
    public $fechaAusencia;
    public $fechaAusenciaSQL; // para la BD
    public $motivo;
    public $fechaRecuperacion;
    public $fechaRecuperacionSQL; // para la BD
    public $horario;
    public $horas;
    public $sala;
    public $infoExtra;
    public $fecha; // fecha de la creación del reporte

    public function getNombreArchivo(){
        require_once("Util.php");
        $u = new Util();

        $time = time();

        $nombre = date("dmY_", $time);
        $doc = str_replace(" ", "_", $this->docente);
        $car = str_replace(" ", "_", $u->pasarMinusculas($this->carrera));
        $asi = str_replace(" ", "_", $this->asignatura);

        $nombre = $nombre.$doc."_".$car."_".$asi.".pdf";
        return $nombre;
    }

    public function getReporteHTML(){
        $css = file_get_contents("css/estilosReporteRecuperacion.css");

        $html = '<style>'.$css.'</style>

        <body>
            <div id="hoja2">
                <div>Nº '.$this->id.'</div>
                <div id="logo">
                    <img id="logoPng" src="images/logo.jpg" alt="Logo" />
                </div>

                <div id="titulo">
                    <h1>SOLICITUD DE RECUPERACIÓN</h1>
                    <h1>DE CLASES</h1>
                </div>

                <form action="procesar.php" method="post">
                    <div id="content">
                        <div class="row">
                            <div class="titContenido2">
                                NOMBRE DOCENTE
                            </div>
                            <div class="inputContenido">
                                : '.$this->docente.'
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                CARRERA
                            </div>
                            <div class="inputContenido">
                                : '.$this->carrera.'
                            </div>

                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                ASIGNATURA
                            </div>
                            <div class="inputContenido">
                                : '.$this->asignatura.'
                            </div>
                        </div>
                        <div class="row">
                            <div class="titContenido2">
                                SECCIÓN
                            </div>
                            <div class="inputContenido">
                                : '.$this->seccion.'
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                FECHA AUSENCIA
                            </div>
                            <div class="inputContenido">
                                : '.$this->fechaAusencia.'

                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                MOTIVO
                            </div>
                            <div class="inputContenido">
                                : '.$this->motivo.'
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                FECHA RECUPERACIÓN
                            </div>
                            <div class="inputContenido">
                                <div class="inputContenido">
                                    : '.$this->fechaRecuperacion.'
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                HORARIO
                            </div>
                            <div class="inputContenido">
                                : '.$this->horario.'
                            </div>
                        </div>

                        <div class="row" id="cantHoras">
                            <div class="titContenido2">
                                CANTIDAD DE HORAS ACADÉMICAS
                            </div>
                            <div class="inputContenido">
                                : '.$this->horas.'
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                SALA SOLICITADA
                            </div>
                            <div class="inputContenido">
                                : '.$this->sala.'
                            </div>
                        </div>

                        <div class="row">
                            <div class="titContenido2">
                                INFORMACIÓN EXTRA
                            </div>
                            <div class="inputContenido">
                                : '.$this->infoExtra.'
                            </div>
                        </div>

                    </div>
                </form>

                <div id="foot">
                    <div id="firma">
                        <div>
                            -----------------------------
                        </div>
                        <div class="textoFoot">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA DOCENTE
                        </div>
                    </div>

                    <div id="coordinacion">
                        <div>
                            ---------------------------------------------
                        </div>
                        <div class="textoFoot">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VºBº COORDINACIÓN DOCENTE
                        </div>
                    </div>
                </div>
            </div>
        </body>';

        return $html;
    }
}
?>
