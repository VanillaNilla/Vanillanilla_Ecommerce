<!--//LIBRERIA PARA INICIAR SESION-->
<?php 
require "php/conn.php";
require "php/sesion.php"; 


//se mandan a llamar las laterales:
require "php/laterales.php";


//Consulta ala tabla de productos:
$sql = "SELECT * FROM facturacion WHERE id_usuario = ".$id_sesion."";
	$r = mysqli_query($connection, $sql);
	$pedidos = array();
	while($row = mysqli_fetch_assoc($r)){
		array_push($pedidos, $row);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mi Perfil</title>
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
                    
                    <!-- DESPLEAR CATEGORIA -->
                    <h4>Quiza te podría interesar:</h4>
                    <!--PRODUCTO 1-->
                    <?php catalogo_1($connection,2);?>
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                    <h2 class="text-left"></h2>
                    <p>
                        <strong></strong><h1>PERFIL DE USUARIO</h1></strong>
                        <h2><?php echo "$nombre_sesion " .$apellidoPaterno_sesion." $apellidoMaterno_sesion"; ?></h2>
                        <br>
                        </p>
                    <h4>Acciones disponibles sobre la cuenta:</h4>
                    <p>
                    <a href="cambio_clave_uss.php" class="form-control btn btn-success" id="back" role="button"> Cambiar contraseña</a>
                    </p>
                    
                    <p>
                    <a href="cambio_datos_uss.php" class="form-control btn btn-success" id="back" role="button"> Modificar Informacion de perfil</a>
                    </p>

                    <p>
                    <a href="pedidos_uss.php" class="form-control btn btn-success" id="back" role="button"> Historial de pedidos vigentes</a>
                    </p>
                    <!-- /p>
                    <p>
                    <a href="metodos_pago_usser.php" class="form-control btn btn-success" id="back" role="button"> Administrar metodos de pago</a>
                    </p>
                    <p>
                    <a href="direcciones_usser.php" class="form-control btn btn-success" id="back" role="button"> Administrar Direcciones de Envio</a>
                    </p> -->
                </div>
                <!-- TABLA PRUEBA DE USUARIO -->
                <div class="well" id="contenedor">
                    
                <div align="center" class="Estilo17"><h3>PEDIDOS GENERADOS</h3> </div>


                        <!-- Se realiza una consulta para guardar en una variable el arroje de el Query -->
                        <?php 
                    print "<table class='table table-striped' width='100%'>";
                    print"<thead>";
					print "<tr>";
					print "<th>#</th>";
					print "<th>Fecha</th>";
					print "<th>#Usuario</th>";
                    print "<th>#Producto</th>";
                    print "<th>#Pago</th>";
                    print "<th>Cantidad</th>";
                    print "<th>Total</th>";
					print "<th>Calle</th>";
                    print "<th>Mun.</th>";
                    print "<th>Colonia</th>";
                    print "<th>C.P</th>";
                    print "<th>#Int.</th>";
                    print "<th>#Ext</th>";
                    print "<th>Tel.</th>";
                    print "</tr>";
                    print"</thead>";
					for ($i=0; $i < count($pedidos) ; $i++) { 
						print "<tr>";
						print "<td>".$pedidos[$i]["id_pedido"]."</td>";
						print "<td>".$pedidos[$i]["fecha_emision"]."</td>";
						print "<td>".$pedidos[$i]["id_usuario"]."</td>";
                        print "<td>".$pedidos[$i]["id_producto"]."</td>";
                        print "<td>".$pedidos[$i]["id_metodo_pago"]."</td>";
                        print "<td>".$pedidos[$i]["cantidad"]."</td>";
                        print "<td>".$pedidos[$i]["total"]."</td>";
                        print "<td>".$pedidos[$i]["calle"]."</td>";
                        print "<td>".$pedidos[$i]["id_municipio"]."</td>";
                        print "<td>".$pedidos[$i]["colonia"]."</td>";
                        print "<td>".$pedidos[$i]["cp"]."</td>";
                        print "<td>".$pedidos[$i]["n_ext"]."</td>";
                        print "<td>".$pedidos[$i]["n_int"]."</td>";
                        print "<td>".$pedidos[$i]["telefono"]."</td>";
						print "</tr>";
					}
                    print "</table>";
                    
                
				?> 
                        

                </div>

                <!-- TABLA FIN-->
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