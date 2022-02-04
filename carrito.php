<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php";

//Se recupera la conexión con la bdd:
require "php/conn.php";

//se mandan a llamar las laterales:
require "php/laterales.php";

if(!isset($_SESSION['usuario'])) {
    echo '<script language = javascript>
        alert("Te invitamos a iniciar sesión primero!")
        self.location = "login.php"
        </script>';
} else { 
    $_SESSION['cantidad'] = 1;
    $_SESSION['id_producto']= $_GET["id"];

    $sql_detalles= "SELECT * FROM productos WHERE id_producto= '".$_SESSION['id_producto']."'";
    //se ejecuta query, para recabar la info del producto:
    $r= mysqli_query($connection,$sql_detalles);
    $producto_detalles= mysqli_fetch_array($r);

    $_SESSION['descuento']= $producto_detalles["descuento"];
    $_SESSION['precio_envio']= $producto_detalles["envio"];
    $_SESSION['precio_producto']= $producto_detalles["precio"];
    $_SESSION['descripcion']= $producto_detalles["descripcion"];
    $_SESSION['imagen_producto']=$producto_detalles["imagen"];

    //$sql= "SELECT precio FROM productos WHERE id_producto= '.$_SESSION["id_producto"].'";
    if($_POST) {
        if( $_POST['cantidad'] >= 2 ) { 
            $_SESSION['cantidad'] = $_POST['cantidad'];
        }
    }

}
/*var_dump($sql_detalles);

var_dump($_SESSION["cantidad"]);
var_dump($_SESSION["id_producto"]);
var_dump($_SESSION["precio_envio"]);
var_dump($_SESSION["descuento"]);
var_dump($_SESSION["precio_producto"]);
var_dump($_SESSION["imagen_producto"]);
var_dump($id_sesion);*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Compra</title>
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
                <h4>Quiza te podría interesar:</h4>
                <!--PRODUCTO 1-->
                <?php catalogo_1($connection,2);
                    ?>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Inicio</a></li>
                            <li class="active">Producto a comprar</li>
                        </ol>
                        <form method="post">
                        <table class="table table-sm" width="100%">
                            <tr>
                                <th width="12%">Producto</th>
                                <th width="60%">Descripcion</th>
                                <th width="2%">Cant.</th>
                                <th width="10.12%">Precio</th>
                                <th width="10.12%">Descuento</th>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/productos/<?php echo $_SESSION['imagen_producto'] ?>" width="100%" alt="Macarrons">
                                
                                </td>
                                <td>
                                    <p><?php echo $_SESSION['descripcion'] ?></p>
                                </td>
                                <td><input type="number" step="1" name="cantidad" value="<?php echo $_SESSION['cantidad'] ?>"></td>
                                <td><?php echo $_SESSION['precio_producto'] ?></td>
                                <td><?php echo $_SESSION['descuento'] ?></td>
                            </tr>
                          </table>
                          <hr>
                          <table width="100%" class="text-right">
                              <tr>
                                  <td width="79.85%"></td>
                                  <td width="11.55%"><strong>Subtotal:</strong></td>
                                  <td width="9.20%">$<?php echo $_SESSION['precio_producto']*$_SESSION['cantidad'] ?>.00</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><strong>Descuento:</strong></td>
                                <td><?php echo $_SESSION['descuento'] ?></td>
                              </tr>

                              <tr>
                                <td></td>
                                <td><strong>Costo envío:</strong></td>
                                <td><?php echo $_SESSION['precio_envio'] ?></td>
                              </tr>

                              <tr>
                                <td></td>
                                <td><h4><strong>Gran total:</strong></h4></td>
                                <td>$<?php echo $_SESSION['precio_producto']*$_SESSION['cantidad']-$_SESSION['descuento']+$_SESSION['precio_envio'] ?>.00</td>
                              </tr>

                              <tr>
                                <td><a href="index.php" class="btn btn-danger" rol="button">Cancelar compra</a></td>
                                <td><button type="submit" class="btn btn-warning">Actualizar</button></td>
                                <td><a href="checkout.php" class="btn btn-success" rol="button">Pagar</a></td>
                              </tr>
                          </table>
                        </form>
                    
                    </div>
                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                    <!-- DESPLEGAR CATEGORIAS -->
                    <h4>PRODUCTOS DE TEMPORADA:</h4>
                        <!--PRODUCTO 1-->
                        <?php categoria_1($connection,22);
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