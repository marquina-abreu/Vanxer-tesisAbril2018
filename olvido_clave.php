
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="stylesheet"  href="fonts.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="Ajax/Login.js"></script>
</head>
<body>
<?php include_once("header_principal.php");?>
<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br/>
    <br/><br/><br><br/>
    <hr class="section-heading-spacer">
	<section class="container"><center><img src="imagenes/Logo_vanxer2.png" class="img-responsive"></center></section>
	<div class="container">
	<h3 class="section-heading">Recuperar Contraseña</h3>
	<div class="row">
		<div class="col-lg-6">
		<form action="recuperar_clave.php" method="POST" id="formulario_registro_cli">
			<div class="form-group">
				<label for="correo_cli">Correo afiliado a su Usuario:</label>
				<input type="text" class="form-control" name="correo_cli" id="correo_cli" placeholder="Ingrese su Correo">
				<span class="glyphicon form-control-feedback" ></span>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
		</div>
	</div>
	</div>
	<br>

<br/><br/><br><br/><br/>
<div></div>
<br><br><br><br>
<?php include_once("footer.php"); ?>
<!--***************************|
       REDES SOCIALES  
*****************************  |-->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" target="_blank" class="icon icon-facebook2"></a></li>
    <li><a href="#" target="_blank" class="icon icon-instagram"></a></li>
    <li><a href="#" target="_blank" class="icon icon-twitter"></a></li>
    <li><a href="#" target="_blank" class="icon icon-google-plus3"></a></li>
</ul>
</div>

<?php include_once("modales.php"); ?>

<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
