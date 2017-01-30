<?php
$pagActual = $_SESSION["paginaActual"];
$nombre = $_SESSION["nombre"];
$_PROGRAMA = "Recuperaciones v0.2a";
?>

<style>
    body { padding-top: 50px; }
</style>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="#">
                <img width="28px" alt="Brand" src="http://www.prodx.cl/images/ust.png">
            </a>
            <a class="navbar-brand" href="#">[<?php echo ($nombre == null?$_PROGRAMA:$nombre);?>]</a>
        </div>

        <?php
        if($pagActual != 0){
           ?>
               <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if($pagActual == 1){echo "class='active'";}?>>
                    <a <?php if($pagActual == 1){echo "href='#'";}else{echo "href='peticionBootstrap.php'";}?>>Solicitud
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li <?php if($pagActual == 2){echo "class='active'";}?>>
                    
                    <a <?php if($pagActual == 2){echo "href='#'";}else{echo "href='detalle.php'";}?>>Historial 
                        <span class="badge"> 

                            <?php
                            $d = new Data();

                            echo $d->getCantidadRecuperaciones($rut);
                            ?>
                        </span>
                    </a>
                </li>

                <?php
                if ($rut == "16828943-k") {;
                    ?>
                    <li <?php if($pagActual == 3){echo "class='active'";}?>>
                        <a <?php if($pagActual == 3){echo "href='#'";}else{echo "href='crearDocente.php'";}?>>Crear docentes</a>
                    </li>
                    <li <?php if($pagActual == 4){echo "class='active'";}?>>
                        <a <?php if($pagActual == 4){echo "href='#'";}else{echo "href='reportes.php'";}?> >Reportes</a>
                    </li>
                <?php
                }
                ?>
                <!--                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">One more separated link</a></li>
                                            </ul>
                                        </li>-->
            </ul>
            <!--                    <form class="navbar-form navbar-left">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>-->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a 
                        href="#" 
                        class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Páginas relacionadas
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a target="_blank" href="http://www.santotomas.cl/" role="button">
                                Santo Tomás
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a target="_blank" href="https://millave.santotomas.cl/idp/Authn/UserPassword" role="button">
                                Intranet
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
                <!--                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
               <?php 
        }else{
            // es la página index
            ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a 
                        href="#" 
                        class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Páginas relacionadas
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a target="_blank" href="http://www.santotomas.cl/" role="button">
                                Santo Tomás
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a target="_blank" href="https://millave.santotomas.cl/idp/Authn/UserPassword" role="button">
                                Intranet
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Estas lineas ponen el formulario de inicio de sesion en el nav bar -->
                <!--                    <form action="controller/validar.php" method="post" class="navbar-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="rut" type="text" class="form-control" name="rut" placeholder="EJ: 12345678-k">                                        
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </form>-->
            </ul>
        </div>
        
            
                <?php
        }
        ?>
    </div><!-- /.container-fluid -->
</nav>