<?php
session_start();

if (!isset($_SESSION["rut"])) {
    header("location: ../index.php");
} else {
    $rut = $_SESSION["rut"];
    $nombre = $_SESSION["nombre"];
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
setlocale(LC_CTYPE, "es_ES");
require_once("../model/Data.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recuperación de clases - SANTO TOMÁS RANCAGUA</title>

        
        <!-- Esto es del calendario JQUERY -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Esto es del calendario JQUERY -->

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
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
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
        <form action="../controller/recuperar.php" method="post" onsubmit="return confirm('Por favor, REVISE sus datos. ¿Generar PDF?');">
            <div class="container">
                <h1 class="page-header">Solicitud de recuperación de clases</h1>
                <?php
                if($rut == "16828943-k"){
                    echo "<a href='reportes.php'>Reportes</a>";
                    echo "<br>";
                    echo "<a href='crearDocente.php'>Crear docentes</a>";
                }
                ?>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de recuperación</h3>
                    </div>
                    <div class="panel-body">
                        

                        <div class="form-group col-md-6">
                            <label for="rut">Rut docente:</label>
                            <input type="text" class="form-control" id="rut" name="rut" required="required" readonly="readonly" value="<?php echo $rut; ?>">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre docente:</label>
                            <input class="form-control" readonly="true" type="text" id="docente" name="docente" required="required" value="<?php echo $nombre; ?>">
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="carrera">Carrera:</label>
                            
                            <select class="form-control" name="carrera">
                                <?php
                                $d = new Data();

                                $carreras = $d->getCarreras();

                                foreach ($carreras as $c) {
                                    echo "<option value='" . $c->nombre . "'>$c->nombre</option>";
                                }
                                ?>
                            </select>
                            
<!--                            <input class="form-control" list="listCarreras" type="text" name="carrera" required="required">

                            <datalist id="listCarreras">
                                <?php
                                /*$d = new Data();

                                $carreras = $d->getCarreras();

                                foreach ($carreras as $c) {
                                    echo "<option value='" . $c->nombre . "'/>";
                                }*/
                                ?>
                            </datalist>-->
                        </div>


                        <div class="form-group col-md-4" >
                            <label for="asignatura">Asignatura:</label>
                            <input class="form-control" type="text" name="asignatura" required="required">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="seccion">Sección:</label>
                            <input class="form-control" type="text" name="seccion" required="required">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fecchaAusencia">Fecha ausencia:</label>
                            <input class="form-control" type="text" id="fechaAusencia" name="fechaAusencia" placeholder="EJ: 10 de abril de 2016" required />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="motivo">Motivo:</label>
                            <select class="form-control" name="motivo">
                                <option value="FERIADO">FERIADO</option>
                                <option value="LICENCIA">LICENCIA</option>
                                <option value="MOTIVOS PERSONALES">MOTIVOS PERSONALES</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fechaRecuperacion">Fecha recuperación:</label>
                            <input class="form-control" type="text" id="fechaRecuperacion" name="fechaRecuperacion" placeholder="EJ: 10 de abril de 2016" required />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="horario">Horario:</label>
                            <input class="form-control" type="text" name="horario" required="required" placeholder="EJ: 12:40 - 14:25">
                            <div class="alert alert-warning">
                                IMPORTANTE: Los sábados sólo se puede recuperar de 9:00 - 14:00 hrs.
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="horas">Cantidad de horas académicas:</label>
                            <input class="form-control" type="number" name="horas" required="required" min="1" max="6">
                            <div class="alert alert-warning">
                                IMPORTANTE: Sólo se pueden recuperar 6 horas como máximo
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sala">Sala solicitada:</label>
                            <input class="form-control" type="text" name="sala" placeholder="DEJAR EN BLANCO SI NO SABE">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="sala">Información extra:</label>
                            <textarea class="form-control" maxlength="150" name="infoExtra" rows="1" placeholder="OPCIONAL"></textarea>
                        </div>


                <!--<button class="btn btn-success" id="btn" type="submit"><img id="imgPdf" src="images/pdf.png">Generar PDF </button>-->
                        <div class="form-group col-md-12">
                            <button class="btn btn-success" id="btn" type="submit">
                                <span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span>
                                Generar PDF 
                            </button>
                        </div>
                    </div>
                </div>




            </div>
        </form>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
