<!DOCTYPE html>
<?php
// Actualmente estoy trabajando con la versión 6.0 de mPDF
// Página oficial (No me sirvió de mucho):
// https://mpdf.github.io/getting-started/html-or-php.html
require_once("model/Util.php");
require_once("model/DatosReporte.php");
require_once("model/Data.php");

$u = new Util();
$u->showErrors(); // muestra el stack de errores
$u->setLocaleEs(); // español

$d = new DatosReporte();

if(!isset($_POST["docente"])){
    header("location: index.php");
}

/*Recuperando los datos del formulario*/
$d->rut = $_POST["rut"];
$d->docente = $u->pasarMayusculas(strtoupper($_POST["docente"]));
$d->carrera = $u->pasarMayusculas(strtoupper($_POST["carrera"]));
$d->asignatura = $u->pasarMayusculas(strtoupper($_POST["asignatura"]));
$d->seccion = $u->pasarMayusculas(strtoupper($_POST["seccion"]));
$d->fechaAusencia = strtoupper($_POST["fechaAusencia"]);

list($dia, $mes, $anio) = explode(' DE ', $d->fechaAusencia);
$mes = $u->getMes($mes);
$d->fechaAusenciaSQL = $anio."-".$mes."-".$dia;


$d->motivo = $u->pasarMayusculas(strtoupper($_POST["motivo"]));
$d->fechaRecuperacion = strtoupper($_POST["fechaRecuperacion"]);

list($dia, $mes, $anio) = explode(' DE ', $d->fechaRecuperacion);
$mes = $u->getMes($mes);
$d->fechaRecuperacionSQL = $anio."-".$mes."-".$dia;

$d->horario = $u->pasarMayusculas(strtoupper($_POST["horario"]));
$d->horas = strtoupper($_POST["horas"]);
$d->sala = $u->pasarMayusculas(strtoupper($_POST["sala"]));
$d->infoExtra = $u->pasarMayusculas(strtoupper($_POST["infoExtra"]));
/*Recuperando los datos del formulario*/

$data = new Data();
$data->crearRecuperacion($d);
$d->id = $data->getUltimoID();
$d->id = $d->id." [".$u->getFechaFormateadaConHora($data->getFechaCreacion($d->id))."]";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recuperación de clases - SANTO TOMÁS RANCAGUA</title>
        <link rel="stylesheet" href="css/estilos.css" charset="utf-8">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/jspdf.min.js"></script>
    </head>
    <body>
        <?php
        $html = $d->getReporteHTML();
        require_once("mpdf60/mpdf.php");

        //$mPdf = new mPDF('c','A4');
        $mpdf = new mPDF();

        $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8'); // esto es por el error "HTML contains invalid UTF-8 character(s)"

        /*Error Chrome*/
        /*ob_clean();
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="recuperacion_'.$_POST["asignatura"].'.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');*/
        /*Error Chrome*/

        $mpdf->WriteHTML($html);

        $nombreArchivo = $d->getNombreArchivo();
        //'Recuperación_'.str_replace(" ", "_",$_POST["asignatura"]).'.pdf'

        $mpdf->Output($nombreArchivo, "D");
        //$mpdf->Output();
        exit;
        ?>
    </body>
</html>
