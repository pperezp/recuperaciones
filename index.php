<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Recuperaciones</h1>
            <form action="validar.php" method="post" class="navbar-form">
                <div class="input-group col-md-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="rut" type="text" class="form-control" name="rut" placeholder="EJ: 12345678-k">                                        
                </div>
<!--                Rut:<input type="text" name="rut" placeholder="EJ: 12345678-k">-->
                <input type="submit" value="Entrar" class="btn btn-primary">
            </form>

            <?php
            if (isset($_GET["e"])) {
                $e = $_GET["e"];

                if ($e == 1) {
                    $rut = $_GET["rut"];
                    ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <span class="sr-only">Error:</span>
                        El rut <span class="alert-link"><?php echo $rut; ?></span> no se encuentra en la base de datos. 
                    </div>
                    <?php
                } else if ($e == 2) {
                    $nombre = $_GET["nombre"];
                    ?>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <span class="sr-only">Error:</span>
                        El docente <span class="alert-link"><?php echo $nombre; ?></span> se encuentra <span class="alert-link">inhabilitado</span> en la base de datos. Contactar con Patricio Pérez Pinto
                    </div>
                    <?php
                }
            }
            ?>

        </div>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
