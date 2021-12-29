<?php
	session_start();
	include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126705858-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126705858-1');
</script>

	<title>Inicio | Panel de Control</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;">Cesopol: Factura Digital</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Logeado como <i class="btn btn-danger btn-xs" ><b><?php echo $_SESSION['usr_name']; ?></b></i></p></li>
				<li><a href="logout.php">Salir</a></li>
				<?php } else {?>
                
				<li><a href="login.php">Login</a></li>
				<li></li>
                
<script type="text/javascript">
window.location="http://factura.cesopol.com.ar/login2/2354568413698721354978212318756468754697898123/login.php";
</script>                
                
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">

        
      <!--Componente principal de un mensaje de primario o llamado a la acción -->
      <div class="jumbotron">
        <h2><b>Bienvenido/a <?php echo $_SESSION['usr_name']; ?></b></h2>
		<br>
     
   <?php $clienteM = base64_encode($_SESSION['email']); ?>
        <p><b>        
        <h3>Paga ahora con tarjeta de Débito/Crédito</h3>
	<?php echo ("<a class='btn btn-primary' href='https://oncativo.payfun.com.ar/mis-facturas/?token=ZmNkOTY5OTM4NmJhZDZjNTQ5OTc3N2ZhNDgyNzFlMzM5NjMxZjY3Mw==&id=".$clienteM."='target='_blank'>"); ?>
		PAGAR ONLINE AHORA
		</a>
        </b></p>     
        <br>
        <p><b>Seleccione el período a descargar:</b></p>
		
		<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col" class="h3">Período</th>
      <th scope="col">Actual</th>
      <th scope="col">Anterior</th>
      <th scope="col">2 anteriores</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">*</th>
      <td><p><b><?php echo "<a href='indexres.php?periodo=A'>Abrir</a>"; ?></td>
      <td><p><b><?php echo "<a href='indexres.php?periodo=B'>Abrir</a>"; ?></td>
      <td><p><b><?php echo "<a href='indexres.php?periodo=C'>Abrir</a>"; ?></td>
    </tr>
	
  
    
  </tbody>
</table>
<!--  
        <p><b><?php echo "<a href='indexres.php?periodo=A'>Período actual</a>"; ?>
        <br>
		<br>
		<?php echo "<a href='indexres.php?periodo=B'>Período anterior</a>"; ?>
        <br>
		<br>
		<?php echo "<a href='indexres.php?periodo=C'>2 períodos anteriores</a>"; ?>
        </b></p>        
<br>
-->
<p>Con nuestro servicio de pagos seguros online PAYFUN puede abonar sus facturas de CESOPOL desde la comodidad de su casa, en el momento en que lo desee, sin venir a la cooperativa.</p>
        
        		

        
      </div>

    </div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>