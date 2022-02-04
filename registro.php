<?php
//Se llama a la conexión de base de datos (require: es forzosa la llamada al archivo,
// en caso de no encontrarlo termina el proceso, INCLUDE: Manda un mensaje de warning
// y continua)
require "php/conn.php";
//LIBRERIA PARA INICIAR SESION-->
require "php/sesion.php";


//se mandan a llamar las laterales:
require "php/laterales.php";


//validación de nombre:

//Se crea el arreglo para la validacion de errores:
$errores=array();
//Si existe nombre, se ejecuta el corchete
if(isset($_POST["nombre"])){
    $nombre=$_POST["nombre"];
    $a_paterno = $_POST["apellido_paterno"];
    $a_materno = $_POST["apellido_materno"];
    $email= $_POST["email"];
    $contrasena = $_POST["clave"];
    $tipo_usser="0";
    $clave2 = $_POST["clave2"];
    $id_usuario_t= "";

    //Esta validación se hace como un segundo filtro de seguridad para evitar que el usuario salte el required
    //desde la inpeccion de elemento (por esot hacemos validacion desde html y php)
    if($nombre==""){
        $errores[0]="El nombre del usuario es requerido";
    }else if($a_paterno==""){
        $errores[1]="El apellido paterno es requerido";
    }else if($a_materno==""){
        $errores[2]="El apellido materno es requerido";
    }else if($email==""){
        $errores[3]="el email es requerido";
    }else if($contrasena==""){
        $errores[4]="La clave es requerida";
    }else if($contrasena!==$clave2){
        $errores[5]="Las claves no coinciden!";
    }else{
        //VALIDACION DE CORREO:
        if(validarCorreo($email,$connection)){
            //Al primer valor se le pone su valor de 0, para que nos agarré el autoincrement
            $sql="INSERT INTO usuarios(email,contrasenia,nombre,apellido_pat,apellido_mat,id_tipo_usuario) VALUES(";
            //el punto antes del igual me ayuda a concatenar la instruccion previamente realizada en la variable
            $sql.="'".$email."','".$contrasena."','".$nombre."','".$a_paterno."','".$a_materno."','".$tipo_usser."')";
            //se genera el query con una validacion en dado caso que falle a la insercion de usuarios:
                //SE REDIRECCIONA A LA PAGINA DE AGRADECIMIENTO si si funcionó el query completo, de no ser asi, lanza error
                if(mysqli_query($connection,$sql)){
                    header ('Location: registroGracias.php');
                }else{
                $errores[6]= "No se realizó bien la inserción de usuario en la base de datos";
            }
        }else{
            $errores[7]= "Ya existe el correo en la base de datos";
        }
    }
}

    //VALIDAR CORREOS DUPLICADOS
    function validarCorreo($email,$connection){
        $sql="SELECT * FROM usuarios WHERE email='".$email."'";
        $r = mysqli_query($connection,$sql);
        $n = mysqli_num_rows($r);
        //La bandera regresa valor de si existe o no dicho correo registrado
        $bandera = ($n==0)? true : false;
        return $bandera; 
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registro</title>
        <meta charset= "utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--Llamada de bootstrap 3.3.7-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--Llamada de Javascript VALIDAR CAMPOS-->
        <script src="js/validar.js"></script>
        
        

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
                    <!--<img src="img/imagenes_editadas/contacto_bann.jpg" width="100%" height="100%" class="media-object izq" alt="Banner" id="banner">-->
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


                    <h1><strong>REGISTRO</strong> </h1>

                    <H3>Favor de capturar tus datos:</H3>
                    <!--FORMULARIO DE LOGIN-->
                    <!--Se recibe la misma información del formulario dentro de la pagina-->
                    <form class="text-left" action="registro.php" method="post"  onsubmit="return validar();">
                        <div class="form-group text-left">
                            <label for="nombre">* Nombre:</label>
                            <input type="text" name="nombre" id="nombre" pattern="[A-Za-z]+"  class="form-control"  placeholder="Escriba su nombre">
                        </div>

                        <div class="form-group text-left">
                            <label for="apellido_paterno">* Apellido Paterno:</label>
                            <input type="text" name="apellido_paterno"  pattern="[A-Za-z]+"  id="apellido_paterno" class="form-control"  placeholder="Escriba su apellido paterno">
                        </div>

                        <div class="form-group text-left">
                            <label for="apellido_materno">* Apellido Materno:</label>
                            <input type="text" name="apellido_materno" pattern="[A-Za-z]+"  id="apellido_materno" class="form-control"  placeholder="Escriba su apellido materno">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">* Correo Electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control"  placeholder="Escribe tu correo electrónico">
                        </div>

                        <div class="form-group">
                            <label for="clave">* Clave de acceso:</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Escribe tu contraseña">
                        </div>

                        <div class="form-group text-left">
						<label for="clave2">* Repetir clave de acceso:</label>
						<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Confirme su clave de acceso"/>
					    </div>


                        <div class="checkbox">
                            <label for="recordarme"><input type="checkbox">Recordarme</label>
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

                <div class="well text-left" id="contenedor">
                    <a href="olvido_clave.php" class="btn btn-info">¿Olvidó su clave de registro?</a>
                    <br><br>
                    <a href="registro.php" class="btn btn-info">Registrarse</a>
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