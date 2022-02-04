<!--//LIBRERIA PARA INICIAR SESION-->
<?php require "php/sesion.php"; 

//Se recupera la conexión con la bdd:
require "php/conn.php";

//se mandan a llamar las laterales:
require "php/laterales.php";

$errores= array();
//PROCESO DE INGRESO DE DATOS:
if(!isset($_SESSION['usuario'])) {
    echo '<script language = javascript>
        alert("Te invitamos a iniciar sesión primero antes de concretar alguna compra!")
        self.location = "login.php"
        </script>';
} else { 


    //$sql= "SELECT precio FROM productos WHERE id_producto= '.$_SESSION["id_producto"].'";
    if($_POST) {
        // VALIDACIONES
        $calle=$_POST["calle"];
        $num_ext = $_POST["num_ext"];
        $num_int = $_POST["num_int"];
        $municipio= $_POST["municipio"];
        $codigop = $_POST["codigop"];
        $colonia = $_POST["colonia"];
        $telefono = $_POST["telefono"];
    
        //Esta validación se hace como un segundo filtro de seguridad para evitar que el usuario salte el required
        //desde la inpeccion de elemento (por esot hacemos validacion desde html y php)
        if($calle==""){
            $errores[0]="La calle es requerida";
        }else if($num_ext==""){
            $errores[1]="El numero exterior es requerido";
        }else if($municipio==""){
            $errores[2]="el municipio es requerido";
        }else if($codigop==""){
            $errores[3]="el codigo postal es requerido";
        }else if($colonia==""){
            $errores[4]="la colonia es requerida";
        }else if($telefono==""){
            $errores[5]="El telefono es requerido";
        }else{
            $_SESSION['calle']= $calle;
            $_SESSION['num_ext']= $num_ext;
            $_SESSION['num_int']= $num_int;
            $_SESSION['municipio']=  $municipio;
            $_SESSION['codigop']= $codigop;
            $_SESSION['colonia']= $colonia;
            $_SESSION['telefono']= $telefono;

            //se salta al index:
            echo '<script language = javascript>
            alert("Ya solo selecciona tu metodo de pago, y estamos listos!")
            self.location = "pago.php"
            </script>';    

    }
}
}
/*var_dump($_SESSION["cantidad"]);
var_dump($_SESSION["id_producto"]);
var_dump($_SESSION["precio_envio"]);
var_dump($_SESSION["descuento"]);
var_dump($_SESSION["precio_producto"]);
var_dump($_SESSION["imagen_producto"]);
var_dump($_SESSION['calle']);
var_dump($_SESSION['num_ext']);
var_dump($_SESSION['num_int']);
var_dump($_SESSION['municipio']);
var_dump($_SESSION['codigop']);
var_dump($_SESSION['colonia']);
var_dump($_SESSION['telefono']);*/



?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Direccion</title>
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
                    <!-- DESPLEGAR CATEGORIAS -->
                    <h4>PRODUCTOS DE TEMPORADA:</h4>
                    <!--PRODUCTO 1-->
                    <?php categoria_1($connection,22);?>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                        <br>
                        <?php
					if(count($errores)>0){
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					}
				    ?>
                    
                    <ol class="breadcrumb">
                        <li class="active">Producto a Comprar</li>
                        <li class="active">Detalles Envio</li>
                    </ol>
                    <h1><strong>Dirección de Envio</strong> </h1>
                    <H3>Favor de capturar tus datos:</H3>
                    <h5>* Te recordamos que solo realizamos envíos dentro de Jalisco, esperamos tu comprensión. </h5>
                    <!--FORMULARIO DE LOGIN-->
                    <form class="text-left" action="direccion.php" method="post">

                        <div class="form-group text-left">
                            <label for="calle">* Calle:</label>
                            <input type="text" name="calle" id="calle" class="form-control" required placeholder="Ingresa la Calle">
                        </div>

                        <div class="form-group text-left">
                            <label for="num_ext">* Num. Exterior:</label>
                            <input type="number" name="num_ext" id="num_ext" class="form-control" required placeholder="Ingresa el numero exterior">
                        </div>

                        <div class="form-group text-left">
                            <label for="num_int"> Num. Interior:</label>
                            <input type="number" name="num_int" id="num_int" class="form-control" placeholder="Ingresa el numero interior">
                        </div>

                        <div class="form-group text-left">
                            <label for="municipio">* Municipio:</label>
                            <select name="municipio">

                            <!-- SELECT DE MUNICIPIOS (NORMALIZACION ) -->
                            <?php 
                            
                            $sql = "SELECT * FROM municipios";
                            $r = mysqli_query($connection,$sql);
                    
                            while ($valores = mysqli_fetch_array($r)) {
                                print "<option value='".$valores["id_municipio"]."'";
									print "/>".$valores["nombre_mun"]."</option>";
                                
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group text-left">
                            <label for="codigop">* C.P:</label>
                            <!--limitas digitos FALTA-->
                            <input type="number" name="codigop" id="codigop" class="form-control"  required placeholder="Escribe tu codigo postal">
                        </div>

                        <div class="form-group text-left">
                            <label for="colonia">* Colonia:</label>
                            <input type="text" name="colonia" id="colonia" required class="form-control" placeholder="Ingresa tu Colonia">
                        </div>

                        <div class="form-group text-left">
                            <label for="telefono">* Telefono:</label>
                            <input type="number" name="telefono" id="telefono" required class="form-control" placeholder="Ingresa tu telefono">
                        </div>

                        <div class="form-group text-left">
                            <label for="enviar"></label>
                            <input type="submit" name="enviar" id="enviar" class="form-control btn btn-success" role="button">
                        </div>

                        <div class="form-group text-left">
                            <label for="reiniciar"></label>
                            <input type="reset" name="limpiar" id="limpiar" class="form-control btn btn-success" role="button">
                        </div>
                        
                    </form>
                    <br>
                    
                </div>

                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                    <!-- DESPLEAR CATEGORIA -->
                    <h4>Quiza te podría interesar:</h4>
                    <!--PRODUCTO 1-->
                    <?php catalogo_1($connection,2);?>
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