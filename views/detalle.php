<?php
$rut = $_POST["rut"];
$nombre = $_POST["nombre"];


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Recuperaciones de <?php echo $nombre; ?> </h1>

            <a href="reportes.php">Volver</a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Listado de recuperaciones</h2>
                </div>
                <div class="panel-body">
                    <form action="detalle.php" method="post">

                        <div class="panel col-md-6">
                            <input type='hidden' value='<?php echo $rut; ?>' name='rut'>
                            <input type='hidden' value='<?php echo $nombre; ?>' name='nombre'>
                            <div class='col-md-4'>
                                <select class='form-control' name="semestre">
                                    <option value="1">1er Semestre</option>
                                    <option value="2">2do Semestre</option>
                                </select>
                            </div>
                            <div class='col-md-4'> 
                                <select class='form-control' name="anio">
                                    <?php
                                    for ($i = 2017; $i <= 2100; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class='col-md-4'> 
                                <input type='submit' value='Filtrar' class='btn btn-success'>
                            </div>
                        </div>

                    </form>
                    <?php
                    if (isset($_REQUEST["semestre"])) {
                        require_once("../model/Data.php");
                        $d = new Data();
                        
                        $semestre = $_REQUEST["semestre"];
                        $anio = $_REQUEST["anio"];

                        $horas = $d->getTotalHorasRecuperacionByFiltro($rut, $semestre, $anio);
                        
                        if ($semestre == "1") {
                            $semestre = "1er";
                        } else {
                            $semestre = "2do";
                        }

                        echo "<h3 class='alert alert-success col-md-6'>$semestre Semestre del año $anio ($horas horas en total)</h3>";
                    }
                    ?>
                    <table class="table">

                        <tr>
                            <th>ID</th>
                            <th>Asignatura</th>
                            <th>Fecha</th>
                            <th>Horas</th>
                            <th>Ver</th>
                        </tr>
                        <?php
                        

                        if (isset($_REQUEST["semestre"])) {
//                            $d = new Data();
                            $semestre = $_REQUEST["semestre"];
                            $anio = $_REQUEST["anio"];

                            $recup = $d->getRecuperacionesByFiltro($rut, $semestre, $anio);

                            foreach ($recup as $r) {
                                echo "<tr>";
                                echo "<td>$r->id</td>";
                                echo "<td>$r->asignatura</td>";
                                echo "<td>$r->fecha</td>";
                                echo "<td>$r->horas</td>";
                                echo "<td>
                            <form action='ver.php' method='post'>
                                <input type='hidden' name='id' value='$r->id'>
                                    
                                    <button type='submit' class='btn btn-danger'>
                                        <span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span>
                                        Descargar PDF
                                    </button>
                                
                            </form>
                          </td>";
                                echo "</tr>";
                            }
                        }

//                        $recup = $d->getRecuperaciones($rut);
                        ?>
                    </table>
                </div>
            </div>

        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>
