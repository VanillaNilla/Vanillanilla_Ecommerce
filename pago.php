<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 


//Se recupera la conexión con la bdd:
require "php/conn.php";

//se mandan a llamar las laterales:
require "php/laterales.php";


//arreglo de errores:
$errores= array();

//validacion del radio:

if(!isset($_SESSION['usuario'])) {
    echo '<script language = javascript>
        alert("Te invitamos a iniciar sesión primero antes de concretar alguna compra!")
        self.location = "login.php"
        </script>';
} else { 
    if($_POST) {
        $tipoRadio =$_POST['pago'];

        if(isset($tipoRadio)){
            //SE HACE LA ASIGNACIÓN DE LA ULTIMA VARIABLE DE SESION, Y SE PROCEDE A INSERTAR:
            $_SESSION['pago']=$tipoRadio;

            //SE REALIZA QUERY, JUNTANDO TODAS LAS VARIABLES DE SESION (COMPRA):
            var_dump($id_sesion);
            var_dump($_SESSION["id_producto"]);;
            var_dump($_SESSION["pago"]);
            var_dump($_SESSION["cantidad"]);
            var_dump($_SESSION["precio_envio"]);
            var_dump($_SESSION["descuento"]);
            var_dump($_SESSION['calle']);
            var_dump($_SESSION['num_ext']);
            var_dump($_SESSION['num_int']);
            var_dump($_SESSION['municipio']);
            var_dump($_SESSION['codigop']);
            var_dump($_SESSION['colonia']);
            var_dump($_SESSION['telefono']);
            $total= $_SESSION["cantidad"]*$_SESSION["precio_producto"]-$_SESSION["descuento"]+$_SESSION["precio_envio"];
            var_dump($total); 
            $t=time();
            $t=date("Y-m-d H:i:s",$t);

            //ORDEN (id_pedido,fecha_emision,id_usuario,id_producto,id_metodo_pago,cantidad,precio_unitario,total,calle,id_municipio,colonia,cp,n_ext,n_int,telefono)
            $sql_pedido = "INSERT INTO facturacion 
                        VALUES
                        ('0',
                        '{$t}',
                        '{$id_sesion}',
                        '{$_SESSION["id_producto"]}',
                        '{$_SESSION["pago"]}',
                        '{$_SESSION["cantidad"]}',
                        '0',
                        '{$total}',
                        '{$_SESSION["calle"]}',
                        '{$_SESSION["municipio"]}',
                        '{$_SESSION["colonia"]}',
                        '{$_SESSION["codigop"]}',
                        '{$_SESSION["num_ext"]}',
                        '{$_SESSION["num_int"]}',
                        '{$_SESSION["telefono"]}')";
            var_dump($sql_pedido); 
            
            //se inserta el query:
            if(mysqli_query($connection,$sql_pedido)){
                //se salta a la pagina de categorias:
                echo '<script language = javascript>
                alert("Compra realizada exitosamente")
                self.location = "graciascompra.php"
                </script>';
            }else{
                print "Error al generar pedido, intente mas tarde";
            }

        }else{
            echo '<script language = javascript>
            alert("Debes seleccionar alguna opcion!")
            self.location = "pago.php"
            </script>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forma de pago</title>
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
                    <!-- DESPLEAR CATEGORIA -->
                    <h4>Quiza te podría interesar:</h4>
                    <!--PRODUCTO 1-->
                    <?php catalogo_1($connection,2);?>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                        <br>
                    
                    <ol class="breadcrumb">
                        <li>Iniciar Sesión</li>
                        <li>Datos de envío</li>
                        <li class="active">Forma de pago</li>
                    </ol>
                    <h1><strong>Forma de pago</strong> </h1>
                    <H3>Favor de elegir un metodo de pago:</H3>
                    <!--FORMULARIO DE LOGIN-->
                    <form class="text-left" action="pago.php" method="post">
                        <div class="radio">
                            <label><input type="radio" name="pago" id="tarjeta1"  value="1"> Tarjeta de Credito</label>
                        </div>
                        
                        <div class="radio">
                            <label><input type="radio" name="pago" id="tarjeta2" value="2"> Tarjeta de Debito</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="pago" id="efectivo" checked value="3">Efectivo</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="pago" id="paypal" value="4">Pay Pal</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="pago" id="bitcoins" value="5">Bitcoins</label>
                        </div>

                        <div class="form-group text-left">
                            <label for="enviar"></label>
                            <input type="submit" name="enviar" id="enviar" class="form-control btn btn-success" role="button">
                        </div>
                                                
                    </form>
                    <br>
                    
                </div>

            
                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                    
                    <!-- DESPLEGAR CATEGORIAS -->
                    <h4>PRODUCTOS DE TEMPORADA:</h4>
                    <!--PRODUCTO 1-->
                    <?php categoria_1($connection,22);?>

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