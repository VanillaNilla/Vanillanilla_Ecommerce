<!--//LIBRERIA PARA INICIAR SESION-->
<?php 
require "php/conn.php";
require "php/sesion.php"; 

//se mandan a llamar las laterales:
require "php/laterales.php";

$consulta= "SELECT * FROM usuarios WHERE id_usuario = ".$id_sesion." ";
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
                    
                    <!-- DESPLEGAR CATEGORIAS -->
                    <h4>PRODUCTOS DE TEMPORADA:</h4>
                    <!--PRODUCTO 1-->
                    <?php categoria_1($connection,22);?>

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
                    
                <div align="center" class="Estilo17"><h3>DATOS DE LA CUENTA</h3> </div>

                <table class="table table-responsive table-hover" width="80%">
                        <thead>
                        <th width="10%"><div align="right"><span class=""># Cliente </span></div></th>
                        <th width="20%"><div align="right"><span class="">Nombre </span></div></th>
                        <th width="20%"><div align="right"><span class="">Apellido Paterno </span></div></th>
                        <th width="20%"><div align="right"><span class="">Apellido Materno </span></div></th>
                        <th width="10%"><div align="right"><span class="">RFC </span></div></th>
                        <th width="20%"><div align="right"><span class="">Correo</span></div></th>

                        </thead>
                        <tbody>
                        <!-- Se realiza una consulta para guardar en una variable el arroje de el Query -->
                        <?php $resultado= mysqli_query($connection,$consulta);
                        /*Se emplea un while para imprimir los datos, y hacerlo siempre y cuando el resultado tenga un valor distinto de NULL*/
                        while($row=mysqli_fetch_assoc($resultado)){ ?>
                        <tr>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["id_usuario"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["nombre"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["apellido_pat"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["apellido_mat"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["RFC"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["email"]; ?></span></div></td>
                        <!-- <td><a href="proc_eliadmin.php?id=<?php echo $row["id_usuario"];?>"><div align="right"><div align="right"><span class="Estilo16">ELIMINAR</span></div></a></td> -->
                        <!-- <td><a href="actualizar.php?id=<?php echo $row["id_usuario"];?>"><div align="right"><span class="Estilo16">EDITAR</span></div></a></td> -->
                        </tr>
                        </tbody>
                        <?php } 
                        /*Se libera la variable~ */
                        mysqli_free_result($resultado) ?>
                </table>
                </div>

                <!-- TABLA FIN-->
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