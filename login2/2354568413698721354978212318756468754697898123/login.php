<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//Comprobar de envío el formulario
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users2 WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		//$_SESSION['usr_estado'] = $row['estado'];

		if($row['estado']==1){
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['usr_name'] = $row['name'];
			$_SESSION['factura'] = $row['factura'];
			
			header("Location: index.php");
		}else
		$errormsg = "Esta cuenta esta desactivada";
	} else {
		$errormsg = "Revisa los datos!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de session</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="font-family: 'Lobster', cursive;">Cesopol: Factura Digital</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li>
				<li></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Ingreso</legend>
					<!--div class="form-group clearfix">
						<img src="http://www.iconsfind.com/wp-content/uploads/2016/10/20161014_58006bff8b1de.png" alt="" width="200px" class="img-responsive img-circle" style="margin:0 auto">
					</div-->

					<div class="form-group">
						<label for="name">Usuario</label>
						<input type="text" name="email" placeholder="Ingresar Usuario" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" name="password" placeholder="Ingresar Contraseña" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Iniciar Sesion" class="btn btn-primary" />
						<input type="reset" value="Limpiar" class="btn btn-default" >
					</div>
				</fieldset>
			</form>
            

		  <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center"><br>
	  </div>
	</div>
</div>
<div align="center"><h3>¿Cómo ingresar?</h3>
<h4><b>Usuario:</b></h4><b>CESOPOL@NumeroDeUsuario</b> (número de usuario que figura en la vieja factura de papel)<br>
<i>Ejemplo de usuario: CESOPOL@10661</i>
<br>
<h4><b>Contraseña:</b></h4><b>NumeroDeUsuario#APELLIDO</b> (todo en mayúsculas y exactamente como aparece en la factura)<br>
<i>Ejemplo de contraseña para el usuario: 10661#PEREZ</i>
<br>
<br>
Para las organizaciones, empresas y/o apellidos compuestos, va la primer palabra que aparece, limitada por un espacio o un punto (sin el espacio o sin el punto).<br>
<i>Ejemplo: COOP. ELÉCTRICA DE ONCATIVO <b>sería: COOP</b><br></i>
<i>En este ejemplo el usuario sería: <b>CESOPOL@10054</b> y la contraseña <b>10054#COOP</b></i>

</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
