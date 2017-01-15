<!DOCTYPE html>
<?php
// Actualmente estoy trabajando con la versión 6.0 de mPDF
// Página oficial (No me sirvió de mucho):
// https://mpdf.github.io/getting-started/html-or-php.html
require_once("model/Util.php");
require_once("model/DatosReporte.php");
require_once("model/Data.php");

$id = $_POST["id"];

$u = new Util();
$u->showErrors(); // muestra el stack de errores
$u->setLocaleEs(); // español

$data = new Data();

$d = $data->getRecuperacion($id);
$d->docente = $data->getNombre($d->rut);
$d->fechaAusencia = $u->getFechaFormateada($d->fechaAusencia);
$d->fechaRecuperacion = $u->getFechaFormateada($d->fechaRecuperacion);
$d->id = $d->id." [".$u->getFechaFormateadaConHora($d->fecha)."]";

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

        /*Error Chrome*/
        ob_clean();
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="recuperacion_'.$_POST["asignatura"].'.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        /*Error Chrome*/

        $mpdf->WriteHTML($html);

        $nombreArchivo = $d->getNombreArchivo();
        //'Recuperación_'.str_replace(" ", "_",$_POST["asignatura"]).'.pdf'

        $mpdf->Output($nombreArchivo, "I");
        //$mpdf->Output();
        exit;
        ?>
    </body>
</html>
