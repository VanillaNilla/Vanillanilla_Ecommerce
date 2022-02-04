<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 

//SE HACE LA CONEXION CON LA BDD
require "php/conn.php";


//SE HACE CONSULTA PARA JALR LOS PRODUCTOS:
$sql = "SELECT * FROM productos WHERE id_catalogo= 2 LIMIT 12";
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
        <title>Vanilla Nilla INdex</title>
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
                        <li class="active"><a href="promociones.php">Promociones</a></li>
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
    

        <div class="container-fluid bg-3 text-center">
            <h1>¡Conoce la terrorifica promocion del mes!</h1>
            <br>
            <div class="container-fluid text-center">
            <h3>¡PROMOCIONES DEL MES!</h3>
            <p>"Corre corre que se acaban! vuelan y no regresan!" <br>
            Los productos de promociones solo se encuentran vigentes durante un tiempo limitado<br>
            No te quedes sin probarlos.</p>
            <br>
        </div>
              <!-- IMPRESIÓN DINÁMICA DE PRODUCTOS EN INDEX (TODOS LOS PRODUCTOS EN PROMOCION DEL MES)-->
        <?php 
                        $ren = 0;
                        for ($i=0; $i < count($productos) ; $i++) { 
                            if ($ren==0) {
                                print '<div class="row">';
                            }
                            print '<div class="col-sm-3">';
                            print '<p><a href="producto.php?id='.$productos[$i]["id_producto"].'">'.$productos[$i]["nombre_producto"].'</a></p>';
                            print'<a href="producto.php?id='.$productos[$i]["id_producto"].'">';
                            print '<img src="img/productos/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%" alt="'.$productos[$i]["nombre_producto"].'">';
                            print '</a>';
                            print '<p>"'.$productos[$i]["descripcion"].'"</p>';
                            print '<a href="producto.php?id='.$productos[$i]["id_producto"].'"><button type="button" class="btn btn-info"> "'.$productos[$i]["precio"].'"</button></a>';
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
        <!--Pie de pagina-->
        <footer class="container-fluid text-center">
            <!-- &copy;  SIMBOLO DE COPYRIGHT-->
            <p>Todos los derechos reservados &copy;</p>
            <form class="form-inline">
                Buscar: <input type="text" name="buscar" id="buscar" class="form-control" size="50" placeholder="Buscar un producto">
                <button type="button" class="btn btn-info">Ir</button>
            </form>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>