<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 

//SE HACE LA CONEXION CON LA BDD
require "php/conn.php";



//SE HACE CONSULTA PARA JALR LOS PRODUCTOS:
$sql = "SELECT * FROM productos LIMIT 12";
// Se obtiene el resultado del query:
$r= mysqli_query($connection,$sql);
//se acomda en un arreglo:
$productos= array();

//mientras se encuentren resultados, se meteran dentro del arreglo todos los productos:
while($row= mysqli_fetch_array($r)){
    array_push($productos,$row);
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VanillaNilla Index</title>
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
                        <li class="active"><a herf="index.php">INICIO</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="promociones.php">Promociones</a></li>
                        <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!--//libreria de confirmacion de inciio de sesion: login-logout -->
                        <?php require "php/navbar.php";?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron">
            <div class="container text-center">
                <!--TITULO PAGINA BANNER-->
                <img src="img/logo_halloween.png" alt="Logo" style="width:60%">
                <!--Eslogan de la pagina-->
            </div>
        </div>
    




        <div class="container-fluid bg-2 text-center">
            <!-- Información sobre la pagina -->
            <div class="Titulo_index"> 
                <div class="row">
                <h2><span></span class="glyph"><span class="glyphicon glyphicon glyphicon-heart-empty"></span> ¡Bienvenido a la tienda más dulce de todas! <span class="glyphicon glyphicon glyphicon-heart-empty"></span> </h2>
                </div>
                <div class="row text-center">
                        En Vanillanilla ofrecemos buenos momentos, porque no solo buscamos endulzar tu paladar,<br>
                        sino que buscamos endulzar tu vida con un poco de azucar para el cuerpo. <br>

                        Nuestra filosofía gira en torno a encontrarle el lado mas dulce a la vida,,<br>
                        porque no hay nada mejor, que disfrutar del día con una rebanada de pastel. <br>

                    </div>
                </div>
            </div>
            <br>
        
            <!-- IMAGEN -->
            <div class="container">
            <span class="clearfix"></span>
            <div class="caja_centrar">
                <img src="img/sello_calidad.png" class="img-responsive img-rounded" style="width:40%" alt="Pastel de frutillas">
                </div>
            </div>
            
        <!-- FIN DE INFORMACION -->

        <div class="container-fluid bg-3 text-center">
        <h3> Conoce nuestros productos </h3>
        <h4><em>No te pierdas de nuestra delicioso catálogo, disponible al publico</em> <br></h4>

        <!-- IMPRESIÓN DINÁMICA DE PRODUCTOS EN INDEX (TODOS LOS PRODUCTOS)-->
        <?php 
                        $ren = 0;
                        for ($i=0; $i < count($productos) ; $i++) { 
                            if ($ren==0) {
                                print '<div class="row">';
                            }
                            print '<div class="col-sm-3">';
                            print '<img src="img/productos/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%" alt="'.$productos[$i]["nombre_producto"].'">';
                            print '<p><a href="producto.php?id='.$productos[$i]["id_producto"].'">'.$productos[$i]["nombre_producto"].'</a></p>';
                            print '</div>';
                            $ren++;
                            if ($ren==4) {
                                $ren = 0;
                                print "</div>";
                            }
                        }
                        ?>
        </div>

        <br>
        

        <br>
        <!-- ENCUENTRANOS -->
        
        <div class="container-fluid bg-2 text-center">
            <!-- Información sobre la pagina: SOBRENOSOSOTROS -->
            <div class="Titulo_index"> 
                <div class="row">
                <h2><span></span class="glyph"><span class="glyphicon glyphicon glyphicon-heart-empty"></span> ¡Tradición desde 1995! <span class="glyphicon glyphicon glyphicon-heart-empty"></span> </h2>
                </div>
                </br>
                <div class="row text-center">
                <div class="col-sm-6"> 
                   <img src="img/repostera.jpg" class="img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas"> </div>
                   <div class="col-sm-6"> 
                       <br>
                        <p>"Nos dedicamos a consentirte desde hace años, te invitamos,<br>
                        a probar lo más nuevo de nuestra categoria, y visitarnos. <br></p>

                        <p></p>¿Qué esperas para adentrarte en el fabuloso mundo de la dulzura?,<br>
                        Es hora de Vanillarnos y comer un poco de pastel. <br><br></p>

                        <a href="sobrenosotros.php" class="form-control btn btn-success" id="back" role="button"> Conoce más sobre nosotros...</a>

                    </div>
                </div>
            </div>
        </div>
            <br>
            <!-- FIN DE INFO SOBRE PAGINA: SOBRE NOSOTROS -->

            <br>

        <!-- Algun comentario, duda o sugerencia? -->
        
        <div class="container-fluid bg-2 text-center">
            <!-- Información sobre la pagina: SOBRENOSOSOTROS -->
            <div class="Titulo_index"> 
                <div class="row">
                <h2><span></span class="glyph"><span class="glyphicon glyphicon glyphicon-heart-empty"></span> ¿Tienes alguna duda? Contactanos <span class="glyphicon glyphicon glyphicon-heart-empty"></span> </h2>
                </div>
                </br>
                <div class="row text-center">
                <div class="col-sm-5"> 
                        Permitenos saber si ha habido algún problema con tus pedidos,<br>
                       O incluso si solamente quieres agradecer o tienes alguna duda. <br>

                        Se espera puedas recibir respuesta inmediata, antes de las<br>
                        proximas <strong>24 hrs.</strong> <br><br> 

                        <!-- FORMULARIO -->
                        <form action="contactoGracias.php">
                        <!--REQUISITO DE NOMBRE-->
                        <div class="form-group text-left">
                            <label for="nombre">* Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre">
                        </div>

                        <div class="form-group text-left">
                            <label for="nombre">* Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" required placeholder="Escriba sus apellidos">
                        </div>

                        <div class="form-group text-left">
                            <label for="correo">* Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" required placeholder="Escriba su correo">
                        </div>

                        <div class="form-group text-left">
                            <label for="observaciones">* Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="observaciones">
                            </textarea>
                        </div>

                        <div class="form-group text-left">
                            <label for="enviar"></label>
                            <input type="submit" name="enviar" id="enviar" class="form-control btn btn-outline-light" role="button">
                        </div>

                    </form></div>
                        <!-- FIN FORMULARIO -->
                   <div class="col-sm-7"> 
                       <br>
                        <br>
                        <img src="img/pastel_presentacion.jpg" class="img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas">

                    </div>
                </div>
            </div>
            <br>

        </div>


        <br>
        <!--Pie de pagina-->
        <footer class="container-fluid text-center">
            <!-- BARRA DE BUSQUEDA, DESHABILITADA -->
            <form class="form-inline"  method="get">
                Buscar: <input type="text" name="buscar" id="buscar" class="form-control" size="50" placeholder="Buscar un producto">
                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            <br>
            <!-- &copy;  SIMBOLO DE COPYRIGHT-->
            <p>Vanillanilla &copy;</p>
            <br>

            
            <div class="row text-left" >
                <div class="col-sm-2">
                    <a href= "https://www.facebook.com/VanillaTime2/?modal=admin_todo_tour"><span class="glyphicon glyphicon glyphicon-thumbs-up"></span> ¡Siguenos en Facebook! </a>
                </div>

                <div class="col-sm-2">
                <a href= "https://www.facebook.com/VanillaTime2/?modal=admin_todo_tour"><span class="glyphicon glyphicon glyphicon-globe"></span> ¡Siguenos en redes sociales! </a>
                </div>

            </div>

            <br>
            <div class="row text-left" >
                <div class="col-sm-2">
                <a href= "productos.php"><span class="glyphicon glyphicon glyphicon-heart"></span> Productos </a>
                </div>

                <div class="col-sm-2">
                <a href= "promociones.php"><span class="glyphicon glyphicon glyphicon-heart"></span> Promociones </a>
                </div>
            </div>
            <div class="row text-left" >
                <div class="col-sm-2">
                <a href= "contacto.php"><span class="glyphicon glyphicon glyphicon-heart"></span> Contacto </a>
                </div>

                <div class="col-sm-2">
                <a href= "sobrenosotros.php"><span class="glyphicon glyphicon glyphicon-heart"></span> Sobre Nosotros </a>
                </div>

                <div class="col-sm-2">
                <a href= "php/logout_cambio_sesion.php"><span class="glyphicon glyphicon glyphicon-heart"></span> Sesión administrativa </a>
                </div>
            </div>

            <br><br>
            <div class="row text-center" >
            <span class="glyphicon glyphicon glyphicon-heart"> Proyecto desarrollado por: Alma Alejandra Hernández Jiménez 3M <span class="glyphicon glyphicon glyphicon-heart">
            </div>
            <div class="row text-center" >
                <span class="glyphicon glyphicon glyphicon-heart">  Materia| Desarrollo Web | CETI <span class="glyphicon glyphicon glyphicon-heart">
            </div>

            
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>