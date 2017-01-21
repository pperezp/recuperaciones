<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery UI Datepicker - Default functionality</title>

        <!-----------------------CALENDARIO--------------------->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="js/Calendario.js"></script>
        
        <!-----------------------CALENDARIO--------------------->
    </head>
    <body>

        <form action="index.php" method="post">
            Fecha: <input type="text" id="fecha" name="fecha">
            <input type="submit">
        </form>

        <?php
        if (isset($_POST["fecha"])) {
            $fecha = $_POST["fecha"];
            echo "Fecha: $fecha";
        }
        ?>

    </body>
</html>