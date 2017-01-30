<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_SESSION["rut"])) {
    $rut = $_SESSION["rut"];

    if ($rut != "16828943-k") {
        header("location: ../index.php");
    }
} else {
    header("location: ../index.php");
}

require_once '../model/Data.php';
?>
<html>
    <head>
        <title>Crear docente</title>
        <!-- Esto es del calendario JQUERY y para los DROPDOWN DE LOS NAVBAR -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Esto es del calendario JQUERY y para los DROPDOWN DE LOS NAVBAR -->
    </head>
    <body>
        <?php $_SESSION["paginaActual"] = 3;?>
        <?php require_once 'navbar.php';?>
        <div class="container">
            <h1 class="page-header">Crear docente</h1>
            <form action="../controller/crearDocente.php" method="post">
                <div class="panel panel-primary col-md-5">
                    <div class="panel-heading">
                        Datos docente
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="rut">Rut:</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rut" 
                                name="rut" 
                                required="required"
                                >
                        </div>
                        <div class="form-group">
                            <label for="rut">Nombre completo:</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nombre" 
                                name="nombre" 
                                required="required"
                                >
                        </div>
                        <div>
                            <input 
                                type="submit" 
                                class="form-control btn btn-success" 
                                value="Crear docente"
                                >
                        </div>

                        <?php
                        if (isset($_GET["m"])) {
                            $m = $_GET["m"];

                            switch ($m) {
                                case 1:
                                    ?>
                                    <br>
                                    <div class="alert alert-info" role="info">
                                        Docente creado correctamente
                                    </div>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <br>
                                    <div class="alert alert-danger" role="danger">
                                        Docente ya existe!
                                    </div>
                                    <?php
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>

            </form>
            <div class="col-md-7">
                <form action="crearDocente.php" method="post">
                    <div class="form-group">
                        <div class="col-md-8">
                            <input class="form-control" name="filtro" type="text" placeholder="Buscar">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control btn btn-warning" type="submit" value="Buscar">
                        </div>
                    </div>
                </form>
                <table class="table">
                    <tr>
                        <th>Rut</th> 
                        <th>Nombre</th> 
                        <th>Acción</th> 
                    </tr>

                    <?php
                    $d = new Data();

                    if (isset($_POST["filtro"])) {
                        $filtro = $_POST["filtro"];
                        $docentes = $d->getDocentesByFiltro($filtro);

                        foreach ($docentes as $doc) {
                            echo "<tr>";
                            echo "<td>$doc->rut</td>";
                            echo "<td>$doc->nombre</td>";

                            echo "<td>";
                            echo "<form action='../controller/setEstado.php' method='post'>";
                            echo "<input type='hidden' name='rut' value='$doc->rut'>";
                            if ($doc->activo) {
                                echo "<input type='submit' value='Desactivar' class='btn btn-success'>";
                                echo "<input type='hidden' name='estado' value='false'>";
                            } else {
                                echo "<input type='submit' value='Activar' class='btn btn-danger'>";
                                echo "<input type='hidden' name='estado' value='true'>";
                            }
                            echo "</form>";
                            echo "</td>";

                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <link 
            rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
            crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script 
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
            crossorigin="anonymous">
        </script>
    </body>
</html>
