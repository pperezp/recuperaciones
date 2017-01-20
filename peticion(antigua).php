<?php
session_start();

if (!isset($_SESSION["rut"])) {
    header("location: index.php");
} 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
setlocale(LC_CTYPE,"es_ES");
require_once("model/Data.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recuperación de clases - SANTO TOMÁS RANCAGUA</title>
        <link rel="stylesheet" href="css/estilosIndex.css" charset="utf-8">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!--<script
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
        </script>-->

        <script type="text/javascript">
            function buscar(rutDocente){

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/recuperaciones/getNombre.php',
                    data: {
                        rut: rutDocente
                    }
                }).done(function(respuesta){
                    //alert(respuesta);
                    $("#docente").val(respuesta);
                });
            }

            function validar(){
                if($("#docente").val() == "N/A"){
                    $("#rut").focus();
                    $("#rut").select();
                }
            }
        </script>

        <script>
            $(function () {
                $("#fechaAusencia").datepicker();
                $("#fechaAusencia").datepicker({
                    dateFormat: "dd-mm-yy"
                });

                // Getter
                var dateFormat = $("#fechaAusencia").datepicker("option", "dateFormat");

                // Setter
                $("#fechaAusencia").datepicker("option", "dateFormat", "dd 'de' MM 'de' yy");
            });

            $(function () {
                $("#fechaRecuperacion").datepicker();
                /*$("#fechaRecuperacion").datepicker({
                    dateFormat: "dd-mm-yy"
                });*/

                // Getter
                var dateFormat = $("#fechaRecuperacion").datepicker("option", "dateFormat");

                // Setter
                $("#fechaRecuperacion").datepicker("option", "dateFormat", "dd 'de' MM 'de' yy");
            });
        </script>



        <script>
        // español
         $.datepicker.regional['es'] = {
         closeText: 'Cerrar',
         prevText: '<Ant',
         nextText: 'Sig>',
         currentText: 'Hoy',
         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
         weekHeader: 'Sm',
         dateFormat: 'dd/mm/yy',
         firstDay: 1,
         isRTL: false,
         showMonthAfterYear: false,
         yearSuffix: ''
         };
         $.datepicker.setDefaults($.datepicker.regional['es']);

</script>
    </head>
    <body>
        <div id="hoja">
            <div id="logo">
                <img id="logoPng" src="images/logo.jpg" alt="Logo" />
            </div>

            <div id="titulo">
                <h1>SOLICITUD DE RECUPERACIÓN</h1>
                <h1>DE CLASES</h1>
            </div>

            <form action="recuperar.php" method="post" onsubmit="return confirm('Por favor, REVISE sus datos. ¿Generar PDF?');">
                <div class="content">
                    <div class="row">
                        <div class="titContenido">
                            RUT DOCENTE
                        </div>
                        <div class="inputContenido">
                            <input type="text" id="rut" name="rut" required="required" onkeyup="buscar(this.value)"
                            placeholder="EJ: 12345678-k"
                            onblur="validar()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="titContenido">
                            NOMBRE DOCENTE
                        </div>
                        <div class="inputContenido">
                            <input readonly="true" type="text" id="docente" name="docente" required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            CARRERA
                        </div>
                        <div class="inputContenido">
                            <input list="listCarreras" type="text" name="carrera" required="required">
                        </div>
                        <datalist id="listCarreras">
                            <?php
                            $d = new Data();

                            $carreras = $d->getCarreras();

                            foreach ($carreras as $c) {
                                echo "<option value='".$c->nombre."'/>";
                            }
                            ?>
                        </datalist>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            ASIGNATURA
                        </div>
                        <div class="inputContenido">
                            <input type="text" name="asignatura" required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="titContenido">
                            SECCIÓN
                        </div>
                        <div class="inputContenido">
                            <input type="text" name="seccion" required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            FECHA AUSENCIA
                        </div>
                        <div class="inputContenido">
                            <input class="form-control" type="text" id="fechaAusencia" name="fechaAusencia" placeholder="EJ: 10 de abril de 2016" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            MOTIVO
                        </div>
                        <div class="inputContenido">
                            <select name="motivo">
                                <option value="FERIADO">FERIADO</option>
                                <option value="LICENCIA">LICENCIA</option>
                                <option value="MOTIVOS PERSONALES">MOTIVOS PERSONALES</option>
                            </select>
                        </div>
                    </div>

                    <!--<div class="row">
                        <div class="titContenido">
                            RECUPERACIÓN
                        </div>
                        <div class="inputContenido">
                            :<input type="text" name="txt" required="required">
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="titContenido">
                            FECHA RECUPERACIÓN
                        </div>
                        <div class="inputContenido">
                            <div class="inputContenido">
                                <input class="form-control" type="text" id="fechaRecuperacion" name="fechaRecuperacion" placeholder="EJ: 10 de abril de 2016" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            HORARIO
                        </div>
                        <div class="inputContenido">
                            <input type="text" name="horario" required="required" placeholder="EJ: 12:40 - 14:25">
                            <div class="nota">
                                IMPORTANTE: Los sábados sólo se puede recuperar de 9:00 - 14:00 hrs.
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="titContenido" >
                            CANTIDAD DE HORAS ACADÉMICAS
                        </div>
                        <div class="inputContenido">
                            <input type="number" name="horas" required="required" min="1" max="6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="titContenido">
                            SALA SOLICITADA
                        </div>
                        <div class="inputContenido">
                            <input type="text" name="sala" placeholder="DEJAR EN BLANCO SI NO SABE">
                        </div>
                    </div>


                    <div id="rowContExtra" class="row">
                        <div class="titContenido">
                            INFORMACIÓN EXTRA
                        </div>
                        <div class="inputContenido">
                            &nbsp;<textarea maxlength="150" name="infoExtra" rows="4" cols="29" placeholder="OPCIONAL"   ></textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="titContenido">

                        </div>
                        <div id="divBtn" class="inputContenido">
                            <button id="btn" type="submit"><img id="imgPdf" src="images/pdf.png">Generar PDF </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
