<?php
//Iniciar la sesion
session_start();
//
if(!isset($_SESSION["admon"])){
	header("location:index_admon.php");
}
require "php/conn.php";
//Modo de procedimientos dentro de la página (funciones asignadas a letras):
//S - consulta
//A - alta
//B - borrar
//C - cambiar

$errores=array();
if (isset($_GET["m"])) {
	$m = $_GET["m"];
} else {
	$m = "S";
}
//lee la tabla productos
if ($m=="B") {
	$id = $_GET["id"];
	/*//Verificar que el usuario no tenga ningún registro en la tabla "carrito"
	$sql = "SELECT count(*) as num FROM carrito WHERE idUsuario=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	$n = (mysqli_num_rows($r)==1)? $data["num"] : 0;
	if($n>0){
		$errores = array("Este usuario tiene ".$n." registros en el carrito de compras.");
		$m = "S";
    } else { }*/
        
		//Borramos el registro
		$sql = "DELETE FROM usuarios WHERE id_usuario=".$id;
		if(mysqli_query($connection, $sql)){
			header("location:usuarios_admin.php");
		}
		$errores = array("Error al borrar el registro");
	
}
//Detectamos si se envía la información
if(isset($_POST["nombre"])){
    //Recuperamos el identificador
    $id = $_POST["id"];
	//Recuperamos la información del usuario
	$nombre = $_POST["nombre"];
	$apellidoPaterno = $_POST["apellidoPaterno"];
	$apellidoMaterno = $_POST["apellidoMaterno"];
	$correo = $_POST["correo"];
    $contrasenia= $_POST["clave"];
    $rfc_set= $_POST["rfc"];
	//Armamos el SQL
	$sql = "UPDATE usuarios SET ";
	$sql .= "nombre='".$nombre."', ";
	$sql .= "apellido_pat='".$apellidoPaterno."', ";
	$sql .= "apellido_mat='".$apellidoMaterno."', ";
	$sql .= "email='".$correo."', ";
	$sql .= "contrasenia='".$contrasenia."', ";
	$sql .= "RFC='".$rfc_set."', ";
	$sql .= "WHERE id_usuario=".$id;
	//Ejecutamos el sql
	if(mysqli_query($connection, $sql)){
		//Saltamos a la página de pago
		header("location:usuarios_admin.php");
		exit;
	}
}
//lee la tabla usuarios
if ($m=="S") {
	$sql = "SELECT * FROM usuarios";
	$r = mysqli_query($connection, $sql);
	$usuarios = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($usuarios, $data);
	}
}
//lee un usurio
if ($m=="C") {
	$id = $_GET["id"];
	//Leemos el registro del usuario
	$sql = "SELECT * FROM usuarios WHERE id_usuario=".$id;
	$r = mysqli_query($connection, $sql);
	//pasamos los datos a un objeto
	$data = mysqli_fetch_assoc($r);
	//Variables de trabajo
	$nombre = $data["nombre"];
	$apellidoPaterno = $data["apellido_pat"];
	$apellidoMaterno = $data["apellido_mat"];
	$correo = $data["email"];
    $contrasenia= $data["contrasenia"];
    $rfc_set= $data["RFC"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lista de usuarios</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- CSS MODIFICADO -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	</script>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">Admon</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li><a href="#">Productos</a></li>
				<li><a href="#">Pedidos</a></li>
				<li class="active"><a href="usuarios_admin.php">Usuarios</a></li>
				<li><a href="cambiaClave.php">Cambiar clave</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php require "php/navbar_admin.php"; ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">USUARIOS REGISTRADOS</h2>
				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				}
				if($m=="C"){
					
				?>
				<form action="usuarios_admin.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value="<?php print $nombre; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="apellidoPaterno">* Apellido Paterno:</label>
						<input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" required placeholder="Escriba su apellido paterno"  value="<?php print $apellidoPaterno; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="apellidoMaterno">Apellido Materno:</label>
						<input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" placeholder="Escriba su apellido materno"  value="<?php print $apellidoMaterno; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="correo">* Correo electrónico:</label>
						<input type="email" name="correo" id="correo" class="form-control" placeholder="Escriba su correo electrónico"  value="<?php print $correo; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">* Contraseña:</label>
						<input type="text" name="clave" id="clave" class="form-control" placeholder="Escriba su dirección"  value="<?php print $contrasenia; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">* RFC:</label>
						<input type="text" name="rfc" id="rfc" class="form-control" placeholder="Escriba su dirección"  value="<?php print $rfc_set; ?>"/>
					</div>

					<input type="hidden" id="id" name="id" value="<?php print $id; ?>">

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

				</form>
				<?php } 
				if ($m=="S") {
					print "<table class='table table-striped' width='100%'>";
					print "<tr>";
					print "<th>id</th>";
					print "<th>Nombre</th>";
					print "<th>Apellido Paterno</th>";
                    print "<th>Apellido Materno</th>";
                    print "<th>RFC</th>";
                    print "<th>Correo</th>";
                    print "<th>Contraseña</th>";
					print "<th>Modificar</th>";
					print "<th>Borrar</th>";
					print "</tr>";
					for ($i=0; $i < count($usuarios) ; $i++) { 
						print "<tr>";
						print "<td>".$usuarios[$i]["id_usuario"]."</td>";
						print "<td>".$usuarios[$i]["nombre"]."</td>";
						print "<td>".$usuarios[$i]["apellido_pat"]."</td>";
                        print "<td>".$usuarios[$i]["apellido_mat"]."</td>";
                        print "<td>".$usuarios[$i]["RFC"]."</td>";
                        print "<td>".$usuarios[$i]["email"]."</td>";
                        print "<td>".$usuarios[$i]["contrasenia"]."</td>";
						print "<td><a class='btn btn-info' href='usuarios_admin.php?m=C&id=".$usuarios[$i]["id_usuario"]."'>Modificar</a></td>";
						print "<td><a class='btn btn-danger' href='usuarios_admin.php?m=B&id=".$usuarios[$i]["id_usuario"]."'>Borrar</a></td>";
						print "</tr>";
					}
					print "</table>";
				}
				?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
</footer>
</body>
</html>