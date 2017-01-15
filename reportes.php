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
        <h1>Docentes</h1>
        <table border=1>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Recuperaciones</th>
            </tr>
            <?php
            $d = new Data();

            $docentes = $d->getDocentes();

            foreach ($docentes as $doc) {
                echo "<tr>";
                    echo "<td>$doc->rut</td>";
                    echo "<td>$doc->nombre</td>";
                    echo "<td>
                            <form action='detalle.php' method='post'>
                                <input type='hidden' name='rut' value='$doc->rut'>
                                <input type='hidden' name='nombre' value='$doc->nombre'>
                                <input type='submit' value='Ver recuperaciones'>
                            </form>
                          </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
