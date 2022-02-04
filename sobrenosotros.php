<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 


//sE HACE UN REQUIRE A LA BDD PARA PODER TRABAJAR CON ELLA -->
require "php/conn.php";
//se mandan a llamar las laterales:
require "php/laterales.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sobre Nosotros</title>
        <meta charset= "utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--Llamada de bootstrap 3.3.7-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">

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
                        <li class="active"><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
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
                    <?php categoria_1($connection,22);
                    ?>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                    <h2 class="text-center"></h2>
                    <p>
                        <img src="img/imagenes_editadas/banner_nosotros.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">
                        <br><br> </p>
                        <br>
                        <h2 class="text-center"><em><strong>¿Como surgió Vanillanilla?</strong></em></h2>
                        
                    <p>
                        ¿Cuál es la historia detrás de una pequeña pastelería? Hay muchas versiones
                        para contar la historia de cualquier pequeño local deseoso de darse a conocer
                        al público. Y Vanillanilla tiene la suya. <br>
                    
                    </p>
                    <h4><strong>Como iniciamos:</strong></h4>
                    <p>
                        Todo comenzó con una péqueña emprendedora que decidió un día, que se sentía 
                        capaz de realizar cosas que pudieran llegar al gusto de todos. 
                        <br>
                        Desde una humilde cocina sacó sus primeros cupcakes, y después de compartirlos
                        con su familia, decidió que quería compartir de esa calidez del hogar a cuantos
                        fuera posible. Es de ahi, que unos simples cupcakes de vainilla, trajeron a la 
                        vida a una pequeña empresa que comenzó desde la sencillez de un hogar de 8.
                    </p>
                    <h4><strong>Nuestro objetivo:</strong></h4>
                    <p>
                        La filosofía que comprende a Vanillanilla, se resume en la frase, "Disfruta de
                        la vida como si fuera el mas delicioso postre, degustando cada cucharada como 
                        si fuera la primera y la ultima". Queremos llevar a la comodidad de tu hogar el
                        dulce calor de familia que con el paso del tiempo se ha ido perdiendo.
                    </p>

                
                    <span class="clearfix"></span>
                    <div class="caja_centrar_somos">
                    <img src="img/somos_chica_historia.jpg" class="img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">
                    </div>
                </div>
            </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                <h4>Quiza te podría interesar:</h4>
                <!--PRODUCTO 1-->
                <?php catalogo_1($connection,2);
                    ?>
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