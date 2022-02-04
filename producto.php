<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 
//Se recupera la conexión con la bdd:
require "php/conn.php";
//Se realiza la recuperación del id:
if(isset($_GET["id"])){
    $id= $_GET["id"];

    //Se realiza el query para obtener el producto seleccionado:

    $sql = "SELECT * FROM 
                productos
            WHERE
                id_producto='{$id}'";

    // SE GUARDA RESULTADO DE QUERY:
    $r= mysqli_query($connection,$sql);
    $data= mysqli_fetch_array($r);
}

//FUNCION DE MOSTRAR PRODUCTOS DEL MISMO CATALOGO:
function mostrar_productos_categoria($id,$connection){
    //Se realiza el query para obtener el producto seleccionado (solo su nombre y su imagen):
    $sql = "SELECT id_producto,nombre_producto,imagen FROM 
                productos
            WHERE
                id_categoria='{$id}'";

    
    // SE GUARDA RESULTADO DE QUERY:
    $r= mysqli_query($connection,$sql);
    $data2= mysqli_fetch_array($r);

    // VARIABLES DUMP PARA CONSULTAR LO QUE SE ESTA SOLICITANDO:
    //var_dump($sql);
    //var_dump($data2);
    print '<div class="well">'.$data2["nombre_producto"];
    print '<a href="producto.php?id='.$data2["id_producto"].'">
                    <img src="img/productos/'.$data2["imagen"].'" class="media-object img-responsive img-rounded" style="width:100%" alt="Pastel de frutillas"></a></div>';
} 
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Producto</title>
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
                        <li class="active"><a href="productos.php">Productos</a></li>
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


        <div class="container-fluid text-center">
            <div class="row content">
                <!--CONTENIDOS-->
                <!--COLUMNA IZQUIERDA, PRODUCTO-->
                <div class="col-sm-2 sidenav">
                    <img src="img/productos/<?php print $data['imagen']; ?>" class="media-object img-responsive img-rounded" width="100%"/>
                    <br>
                    <h4><strong>Num. Producto:</strong> <?php print $data['id_producto']; ?></h4>
                    <h4><strong>Precio:</strong> $<?php print $data['precio']; ?></h4>
                    <br><br>
                    
                    <a href="carrito.php?id=<?php print $data['id_producto']; ?>" class= "btn btn-success" role="button">Comprar</a>
                    <a href="index.php" class= "btn btn-info" role="button">Regresar</a>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                <h2><?php print $data['nombre_producto']; ?></h2>
                
                <h4><strong>Descripcion de producto:</strong></h4>
                <p><?php print $data['descripcion']; ?></p>
                
                <h4>Ingredientes:</h4>
                <p>
                    "Todos nuestros productos contienen ingredientes en compun como son azucar, 
                    almendras, huevo, leche entera o deslactosada, canela, harina de trigo con
                    gluten o sin gluten dependiendo del producto.<br>
                    * Favor de revisar especificaciones antes de consumir.
                    "
                </p>
                <h4>Expecificaciones del producto:</h4>
                <p>
                    "Cada uno de nuestros productos llegará a tu domicilio bien empaquetado,
                    producrando mantener en la mejor condición tus productos."
                </p>
                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                <h4>Quiza te podría interesar:</h4>
                <!--PRODUCTO 1-->
                <div class="well">
                <!-- VALIDACION PARA BARRA LATERAL: COMPROBAMOS QUE SI TENGA UNA CATEGORIA -->    
                <?php if($data["id_categoria"]!=0){

                    //FUNCION PARA MOSTRAR PRODUCTOS RELACIONADOS A LA MISMA CATEGORIA:
                    mostrar_productos_categoria($data["id_categoria"],$connection);

                } //FIN DE IF DE VALIDACIÓN RELACIONADOS1.

                if($data["id_categoria"]!=0){

                    //FUNCION PARA MOSTRAR PRODUCTOS RELACIONADOS A LA MISMA CATEGORIA:
                    mostrar_productos_categoria($data["id_categoria"],$connection);

                } //FIN DE IF DE VALIDACIÓN RELACIONADOS2.

                if($data["id_categoria"]!=0){

                    //FUNCION PARA MOSTRAR PRODUCTOS RELACIONADOS A LA MISMA CATEGORIA:
                    mostrar_productos_categoria($data["id_categoria"],$connection);

                } //FIN DE IF DE VALIDACIÓN RELACIONADOS3.
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