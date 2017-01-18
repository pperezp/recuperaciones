<?php
require_once("model/Data.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Docentes</h1>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Listado de docentes</h2>
                </div>
                <div class="panel-body">

                    <form action="reportes.php" method="post">
                        <input type="text" placeholder="Buscar docente" name="filtro" value="<?php
                        if (isset($_POST["filtro"])) {
                            $filtro = $_POST["filtro"];
                            echo $filtro;
                        }
                        ?>">
                        <input type="submit" class="btn btn-default" value="Buscar">
                    </form>

                    <table class="table">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Recuperaciones</th>
                        </tr>
                        <?php
                        $d = new Data();

                        if (isset($_POST["filtro"])) {
                            $filtro = $_POST["filtro"];
                            $docentes = $d->getDocentesByFiltro($filtro);
                        } else {
                            $docentes = $d->getDocentes();
                        }

                        foreach ($docentes as $doc) {
                            echo "<tr>";
                            echo "<td>$doc->rut</td>";
                            echo "<td>$doc->nombre</td>";
                            echo "<td>
                            <form action='detalle.php' method='post'>
                                <input type='hidden' name='rut' value='$doc->rut'>
                                <input type='hidden' name='nombre' value='$doc->nombre'>
                                 

                                <button type='submit' class='btn btn-success'>
                                    <span class='glyphicon glyphicon-book' aria-hidden='true'></span>
                                    Ver
                                </button>
                            </form>
                          </td>";
                            echo "</tr>";
                        }
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
