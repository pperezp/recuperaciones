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
        <h1>Recuperaciones de <?php echo $nombre;?></h1>
        <table border=1>
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
                                <input type='submit' value='Ver PDF'>
                            </form>
                          </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
