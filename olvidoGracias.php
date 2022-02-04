<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset= "utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--Llamada de bootstrap 3.3.7-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--Llamada de Javascript-->
        
        

    </head>
    <body>
        <!--HEADER-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand"><img src="img/flor_negra.png" alt="Logo" style="width:30px"></a>
                </div>
            <!--BARRITA DE NAVEGACIÓN-->
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">INICIO</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="promociones.php">Promociones</a></li>
                        <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                        <li class="active" id="seleccion"><a href="contacto.php">Contacto</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!--//libreria de confirmacion de inciio de sesion: login-logout -->
                        <?php require "php/navbar.php";?>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid text-center">
            <div class="row content">
                <!--CONTENIDOS-->
                <!--COLUMNA IZQUIERDA, PRODUCTO-->
                <div class="col-sm-2 sidenav">
                    <h4>PRODUCTOS DE TEMPORADA:</h4>
                    <!--PRODUCTO 1-->
                    <div class="well">Pastel de 3 leches
                    <a href="producto.php">
                        <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                    </a>
                    </div>
            
                    <!--PRODUCTO 2-->
                    <div class="well">Index
                    <a href="index.php">
                        <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                    </a>
                    </div>
            
                    <!--PRODUCTO 3-->
                    <div class="well">Index
                        <a href="index.php">
                            <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                        </a>
                    </div>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                        <br>
                    <img src="img/imagenes_editadas/contacto_bann.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">
                    <br>
                    <h1><strong>Login</strong> </h1>
                    <br>
                    <h2>En breve llegará a su correo la clave de acceso~</h2>
                    <br>
                    <a href="index.php" class="btn btn-info">Regresar</a>
                </div>
                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                <h4>Quiza te podría interesar:</h4>
                <!--PRODUCTO 1-->
                <div class="well">Pastel de 3 leches
                <a href="producto.php">
                    <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                </a>
                </div>
        
                <!--PRODUCTO 2-->
                <div class="well">Index
                <a href="index.php">
                    <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                </a>
                </div>
        
                <!--PRODUCTO 3-->
                <div class="well">Index
                    <a href="index.php">
                        <img src="img/imagenes_editadas/pastel_menta.jpg" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                    </a>
                </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!--Pie de pagina-->
        <footer class="container-fluid text-center">
            <!-- &copy;  SIMBOLO DE COPYRIGHT-->
            <p>Todos los derechos reservados &copy;</p>
            <form class="form-inline">
                Buscar: <input type="text" name="buscar" id="buscar" class="form-control" size="50" placeholder="Buscar un producto">
                <button type="button" class="btn btn-info">Ir</button>
            </form>
            <a href="aviso.php">Aviso de Privacidad</a>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>