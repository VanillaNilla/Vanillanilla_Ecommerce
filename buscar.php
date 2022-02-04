<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 
//SE HACE LA CONEXION CON LA BDD
require "php/conn.php";

if(isset($_GET("buscar"))){
    $buscar = $_GET["buscar"];
    $sql_busqueda= "SELECT * FROM productos WHERE nombre_producto LIKE '%".$buscar."%'";

    //Se obtiene el resultado del query:
    $r=mysqli_query($connection,$sql_busqueda);
    //SE CREA UN ARREGLO PARA ALMACENAR LOS PRODUCTOS:
    $productos= array();

    //se rellena el arrelo:
    while($data= mysqli_fetch_assoc($r)){
        array_push($productos,$data);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contacto</title>
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
                <div class="col-sm-8 text-center">
                    <div class="well" id="contenedor">
                        <br>
                    <img src="img/imagenes_editadas/contacto_bann.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">
                    <br>
                    <p>Favor de capturar tus datos:</p>
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

                        <div class="form-group text-left">
                            <label for="reiniciar"></label>
                            <input type="reset" name="limpiar" id="limpiar" class="form-control btn btn-outline-light" role="button">
                        </div>
                    </form>

                    <div class="well" id="mapa">
                        <img src="img/imagenes_editadas/mapabann.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">
                        <br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119475.94063462027!2d-103.4489247064054!3d20.644212201697687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d0d63c6972c04eb!2sExpendio%20Marisa!5e0!3m2!1ses-419!2smx!4v1603943346299!5m2!1ses-419!2smx" width="100%" height="400px" frameborder="10px" style="border:10px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <br><br>
                        <p class="text-left"><strong>Ubicado en: </strong> Cima Strip Center<br>
                            <strong>Dirección:</strong> Av. Juan Gil Preciado 1600 A, Arcos de Zapopan, 45130 Zapopan, Jal.<br>
                            <small><strong>Horario: </strong><br>
                            miércoles	9:00–21:00<br>
                            jueves	9:00–21:00<br>
                            viernes	9:00–21:00<br>
                            sábado	9:00–21:00<br>
                            domingo	11:00–19:00<br>
                            lunes	9:00–21:00<br>
                            martes	9:00–21:00<br><br> </small>
                            <strong>Teléfono:</strong> 33 3364 0648</p>
                    </div>
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
                <div class="well" >Index
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