<!--//LIBRERIA PARA INICIAR SESION-->
<?php 
require "php/conn.php";
require "php/sesion.php"; 

$consulta1= "SELECT * FROM metodo_pago WHERE id_usuario = ".$id_sesion." ";

if(isset($_POST["clave"])){
    $clave=$_POST["clave"];
    $clave2= $_POST["clave_nueva"];

    if($clave==$clave2){
        //actualizar datos:
    $actualizar = "UPDATE usuarios SET contrasenia='$clave' WHERE id_usuario='$id_sesion'";
    $resultado=mysqli_query($connection,$actualizar);

    
    if (!$resultado) //opción1: En caso de fallo al registrar, me indicará el programa.
    {
        echo '<script>
        alert("Error al completar el refresh!");
        self.location = "perfil_usuario.php"
        </script>';
        
    }
    else //opcion2: Usuario actualizado correctamente
    {
        //Datos actualizados!
        echo '<script>
        alert("contraseña actualiza exitosamente!");
        self.location = "perfil_usuario.php"
        </script>';
        
        
    }
    }else{
        echo '<script>
        alert("Contraseñas no coinciden!");
        self.location = "cambio_clave_uss.php"
        </script>';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mis Tarjetas</title>
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
                    
                </div>
        
                <!--Aqui va la info del producto COLUMNA CENTRO-->
                <div class="col-sm-8 text-left">
                    <div class="well" id="contenedor">
                    <h2 class="text-left"></h2>
                    <p>
                        <strong></strong><h1>Agregar Tarjeta</h1></strong>
                        
                        <form class="text-left" action="cambio_clave_uss.php" method="post">

                        <div class="form-group">
                            <label for="clave">* Nombre de la Tarjeta:</label>
                            <input type="text" name="nombre_t" id="nombre_t" class="form-control" required placeholder="Escribe el nombre de la nueva tarjeta" value="">
                        </div>

                        <div class="form-group">
                            <label for="clave">* Titular de la Tarjeta:</label>
                            <input type="text" name="titular_t" id="titular_t" class="form-control" required placeholder="Escribe el nombre del titular" value="">
                        </div>

                        <div class="form-group">
                            <label for="clave">* Fecha_Vencimiento:</label>
                            <input type="date" name="titular_t" id="titular_t" class="form-control" required placeholder="Escribe el nombre del titular" value="">
                        </div>

                        <div class="form-group text-left">
                            <label for="btninsertar"></label>
                            <input type="submit" name="enviar" id="enviar" value="ingresar" class="form-control btn btn-outline-light" role="button">
                        </div>

                        <div class="form-group text-left">
                            <label for="reiniciar"></label>
                            <input type="reset" name="limpiar" id="limpiar" class="form-control btn btn-outline-light" role="button">
                        </div>
                        
                    </form>
                        <br>
                        </p>
                    
                </div>
                <!-- TABLA PRUEBA DE USUARIO -->
                <div class="well" id="contenedor">
                    
                <div align="center" class="Estilo17"><h3>TARJETAS AFILIADAS</h3> </div>

                <table class="table table-sm" width="100%">
                        <tr>
                        <th width="10%"><div align="right"><span class="Estilo16"># Tarjeta </span></div></th>
                        <th width="35%"><div align="right"><span class="Estilo16">Titular </span></div></th>
                        <th width="20%"><div align="right"><span class="Estilo16">Fecha de Vencimiento </span></div></th>
                        <th width="35%"><div align="right"><span class="Estilo16">Nombre de la tarjeta</span></div></th>


                        </tr>
                        <!-- Se realiza una consulta para guardar en una variable el arroje de el Query -->
                        <?php $resultado= mysqli_query($connection,$consulta1);
                        /*Se emplea un while para imprimir los datos, y hacerlo siempre y cuando el resultado tenga un valor distinto de NULL*/
                        while($row=mysqli_fetch_assoc($resultado)){ ?>
                        <tr>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["id_tarjeta"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["Titular"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["Fecha_Vencimiento"]; ?></span></div></td>
                        <td><div align="right"><span class="Estilo16"><?php echo $row["Nombre_Tarjeta"]; ?></span></div></td>

                        <!-- <td><a href="proc_eliadmin.php?id=<?php echo $row["id_usuario"];?>"><div align="right"><div align="right"><span class="Estilo16">ELIMINAR</span></div></a></td> -->
                        <!-- <td><a href="actualizar.php?id=<?php echo $row["id_usuario"];?>"><div align="right"><span class="Estilo16">EDITAR</span></div></a></td> -->
                        </tr>
                        <?php } 
                        /*Se libera la variable~ */
                        mysqli_free_result($resultado) ?>
                </table>
                </div>

                <!-- TABLA FIN-->
            </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                
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