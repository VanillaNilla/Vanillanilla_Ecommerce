<?php
//Se llama a la conexión de base de datos (require: es forzosa la llamada al archivo,
// en caso de no encontrarlo termina el proceso, INCLUDE: Manda un mensaje de warning
// y continua)
require "php/conn.php";
//LIBRERIA PARA INICIAR SESION-->
require "php/sesion.php";
//se mandan a llamar las laterales:
require "php/laterales.php";



//detecta si se envía la información
if(isset($_GET["email"])){
    $email= $_GET["email"];
    //Buscar correo en base de datos:
    $sql= "SELECT * FROM usuarios WHERE email= '".$email."'";
    $r= mysqli_query($connection,$sql);
    $n = mysqli_num_rows($r);

    if($n==1){
        //dentro de data se rescata el identificador del usuario del correo
        $data = mysqli_fetch_assoc($r);
        $id = $data["ID_usuario"];
        PRINT "SI SE ENCONTRÓ EL CORREO";
        
        
    }else{
        //AQUI AUN DEBO PONER ALGUN COSO PARA QUE SE VEA BONITO SI ES QUE NO ENCUENTRA EL CORREO
        header("location:index.php");
    }
}

//datosrecibidos del formulario "cambiaClave"
if(isset($_GET["id"])){
    $id2= $_GET["id"];
    $clave= $_GET["clave"];
    $clave2= $_GET["clave2"];
    //Verificación de claves:
    if($clave==$clave2){
        print "el id es: $id2";
        
    }else{
        $error= "Las claves de acceso no coinciden";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Actualizar clave</title>
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
                        
                        <br>
                    <!--<img src="img/imagenes_editadas/contacto_bann.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">-->
                    <br>
                    <?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
							print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				    ?>


                    <h1><strong>Actualizar Clave de Acceso</strong> </h1>
                    <br>
                    <H3>Favor de capturar tus datos:</H3>
                    <!--FORMULARIO DE LOGIN-->
                    <!--Se recibe la misma información del formulario dentro de la pagina-->
                    <form class="text-left" action="cambiaClave.php" method="get">
                    
                        <div class="form-group">
                            <label for="clave">* Nueva Clave de acceso:</label>
                            <input type="text" name="clave" id="clave" class="form-control" required placeholder="Escribe tu contraseña">
                        </div>

                        <div class="form-group">
                            <label for="clave2">* Confirmación de nueva Clave de acceso:</label>
                            <input type="text" name="clave2" id="clave2" class="form-control" required placeholder="Escribe tu contraseña nuevamente">
                        </div>


                        <div class="form-group text-left">
                            <label for="enviar"></label>
                            <input type="submit" name="enviar" id="enviar" class="form-control btn btn-success" role="button">
                        </div>

                        <div class="form-group text-left">
                            <label for="reiniciar"></label>
                            <input type="reset" name="limpiar" id="limpiar" class="form-control btn btn-success" role="button">
                        </div>

                        <input type="hidden" name="email2" id="email2" value="<?php $email;?>">
                        
                    </form>
                    <br>
                    
                </div>

                <div class="well text-left" id="contenedor">
                    <a href="olvido_clave.php" class="btn btn-info">¿Olvidó su clave de registro?</a>
                    <br><br>
                    <a href="registro.php" class="btn btn-info">Registrarse</a>
                </div>
                </div>
        
                <!--SUGERENCIAS DE PRODUCTOS-->
                <div class="col-sm-2 sidenav">
                <h4>Quiza te podría interesar:</h4>
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