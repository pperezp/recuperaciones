<?php
$rut = $_POST["rut"];
$nombre = $_POST["nombre"];

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
            <h1 class="page-header">Recuperaciones de <?php echo $nombre; ?></h1>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Listado de recuperaciones</h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Asignatura</th>
                            <th>Fecha</th>
                            <th>Ver</th>
                        </tr>
                        <?php
                        $d = new Data();

                        $recup = $d->getRecuperaciones($rut);

                        foreach ($recup as $r) {
                            echo "<tr>";
                            echo "<td>$r->id</td>";
                            echo "<td>$r->asignatura</td>";
                            echo "<td>$r->fecha</td>";
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
