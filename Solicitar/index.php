<?php 
error_reporting(E_ERROR | E_PARSE);
include_once("../pdo_conexion.php");
$msj="";
if ($_POST["nomb_tra"]&&$_POST["apellido"]&&$_POST["modelo"]&&$_POST["cantidad"]&&$_POST["comentario"]&&$_POST["zona"]) {
	$nombre=$_POST["nomb_tra"];
	$apellido=$_POST["apellido"];
	$modelo=$_POST["modelo"];
	$cantidad=$_POST["cantidad"];
	$comentario=$_POST["comentario"];
	$zona=$_POST["zona"];
	$correo=$_POST["correo"];
	$telf=$_POST["telf"];

	$sql=$conexion->prepare("INSERT INTO solicitud_trans (id_solicitud_trans,nombre_tr,apellido_tr,correo,telefono,modelo_va,cantidad_t,comentario_t,zona) VALUES (null,:nombre,:apellido,:correo,:telf,:modelo,:cantidad,:comen,:zona)");
	$sql->execute(array(
		":nombre"=>$nombre,
		":apellido"=>$apellido,
		":modelo"=>$modelo,
		":cantidad"=>$cantidad,
		":comen"=>$comentario,
		":zona"=>$zona,
		":correo"=>$correo,
		":telf"=>$telf));
	if ($sql!==false) {
		$msj.="<label class='alert alert-success'>Solicitud Enviada con Exito</label>";
	}
}else{

}







?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../Style/style1.css">
	<link rel="stylesheet" type="text/css" href="../js/jquery-ui.css">
	<link rel="stylesheet"  href="../fonts.css">
	<script src="../jq/jquery-3.2.1.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
    <script src="../js/JqueryValidate.js"></script>
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="../Ajax/Login.js"></script>
</head>
<body>
<?php include_once("header.php");?>
<br><br><br>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
	<form action="" id="solic_trans" method="POST">
	<h3><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Solicitud Transportista</h3>
	<?php echo $msj; ?>
	<div class="form-group">
		<label for="nomb_tra">Nombre:</label>
		<input type="text" class="form-control" placeholder="Ingrese su nombre" id="nomb_tra" name="nomb_tra">
	</div>
	<div class="form-group">
		<label for="apellido">Apellido:</label>
		<input type="text" class="form-control" placeholder="Ingrese su apellido" id="apellido" name="apellido">
	</div>
	<div class="form-group">
		<label for="correo">Correo:</label>
		<input type="text" class="form-control" placeholder="Ingrese su Correo" id="correo" name="correo">
	</div>
	<div class="form-group">
		<label for="telf">Telefono:</label>
		<input type="text" class="form-control" placeholder="Ingrese su Telefono" id="telf" name="telf">
	</div>
	<div class="form-group">
		<label for="modelo">Modelo de Vehiculo:</label>
		<input type="text" class="form-control" placeholder="Modelo de vehiculo" id="modelo" name="modelo">
	</div>
	<div class="form-group">
		<label for="cantidad">Capacidad:</label>
		<input type="number" class="form-control" placeholder="Ingrese una cantidad"  id="cantidad" name="cantidad">
	</div>
	<div class="form-group">
		<label for="comentario">Comentario:</label>
		<textarea class="form-control" id="comentario" name="comentario" placeholder="Ingrese un comentario"></textarea> 
	</div>
	<div class="form-group">
		<label for="zona">Zona a trabajar:</label>
		<input type="text" class="form-control" placeholder="Ingrese una zona"  id="zona" name="zona">
	</div>
	<button type="submit" class="btn btn-info btn-block">Enviar Solicitud</button>
	</form>
	<br>
	<a href="../" class="btn btn-primary btn-block">Volver</a>
	<br><br><br><br>
	</div>
	</div>
</div>



<?php include("../footer.php");?>
<!--***************************|
       REDES SOCIALES  
*****************************  |-->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" target="_blank" class="icon icon-facebook2"></a></li>
    <li><a href="https://www.instagram.com/marquina_abreu/" target="_blank" class="icon icon-instagram"></a></li>
    <li><a href="#" target="_blank" class="icon icon-twitter"></a></li>
    <li><a href="#" target="_blank" class="icon icon-google-plus3"></a></li>
</ul>
</div>

<?php include_once("modales.php"); ?>

<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
