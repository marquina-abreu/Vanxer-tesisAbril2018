<?php 

include_once("../pdo_conexion.php");
$idusuario=$_GET["dsd"];

$sql=$conexion->prepare("SELECT id_transporte,nombre_trans,apellido_trans FROM transportistas INNER JOIN usuarios ON transportistas.id_usuario_trans=usuarios.id_usuario
	WHERE usuarios.id_usuario=:id");
$sql->execute(array(":id"=>$idusuario));
$result=$sql->fetch();


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
<script type="text/javascript">
$(document).ready(function() {
   $("#fech_recor").datepicker();
   jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});

  // 1er preg
  $("#fech_recor2").datepicker();
   jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});
 // 2da preg
 $("#fech_recor3").datepicker();
   jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});
 //3era pre
 $("#fech_recor4").datepicker();
   jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});
 //4ta preg
 $("#fech_recor5").datepicker();
   jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});
});
</script>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
<br>
	<form action="./final/" id="" method="POST">
	<h3><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Mantenimiento del Vehículo</h3>

	<h3>Hola, <?php echo $result["nombre_trans"]." ".$result["apellido_trans"] ?></h3>
	
	<div class="form-group">
		<label for="comentario">¿Cada cuanto cambia de aceite al motor? :</label>
		<p>Cada:</p><input type="text" name="aceite" placeholder="Haz clic aqui" class="form-control" id="fech_recor" readonly="readonly"  /><p style="display:inline-block"> de cada mes</p>
	</div>
	<div class="form-group">
		<label for="comentario">1er Recordatorio  (opcional):</label>
		<input type="text" style="display:inline-block;" class="form-control" placeholder="Ingrese un recordatorio"  name="resp1">
		<p>Cada:</p>
		<input type="text" style="display:inline-block" name="res_fe_1" placeholder="Haz clic aqui" class="form-control" id="fech_recor2" readonly="readonly"  />
		<button class="btn btn-primary" title="Personalizar fecha"><span class="glyphicon glyphicon-cog"></span></button>
		<p> de cada mes</p>
	</div>
	<div class="form-group">
		<label for="comentario">2do Recordatorio  (opcional):</label>
		<input type="text"  class="form-control" placeholder="Ingrese un recordatorio" name="resp2">
		<p>Cada:</p>
		<input type="text" style="display:inline-block;" name="res_fe_2" placeholder="Haz clic aqui" class="form-control" id="fech_recor3" readonly="readonly"  />
		<button class="btn btn-primary" title="Personalizar fecha"><span class="glyphicon glyphicon-cog"></span></button>
		<p> de cada mes</p>
	</div>
	<div class="form-group">
		<label for="comentario">3er Recordatorio  (opcional):</label>
		<input type="text"  class="form-control" placeholder="Ingrese un recordatorio" name="resp3">
		<p>Cada:</p>
		<input type="text" style="display:inline-block;" name="res_fe_3" placeholder="Haz clic aqui" class="form-control" id="fech_recor4" readonly="readonly"  />
		<button class="btn btn-primary" title="Personalizar fecha"><span class="glyphicon glyphicon-cog"></span></button>
		<p> de cada mes</p>
	</div>
	<div class="form-group">
		<label for="comentario">4to Recordatorio  (opcional):</label>
		<input type="text"  class="form-control" placeholder="Ingrese un recordatorio" name="resp4">
		<p>Cada:</p>
		<input type="text" style="display:inline-block;" name="res_fe_4" placeholder="Haz clic aqui" class="form-control" id="fech_recor5" readonly="readonly"  />
		<button class="btn btn-primary" title="Personalizar fecha"><span class="glyphicon glyphicon-cog"></span></button>
		<p> de cada mes</p>
	</div>
	<input type="hidden" value="<?php echo $result["id_transporte"]?>" name="idtra">
	
	<button type="submit" class="btn btn-info btn-block">Finalizar </button>
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
