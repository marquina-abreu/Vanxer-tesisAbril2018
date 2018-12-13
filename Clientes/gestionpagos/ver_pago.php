<?php
include_once("../../pdo_conexion.php");
include "../config_base.php";
include "../functions.php";
$id_pago=$_GET["idp"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../Style/style1.css">
	<link rel="stylesheet" type="text/css" href="../../Style/Style_paginacion.css">
	<link rel="stylesheet"  href="../../fonts.css">
	<script src="../../jq/jquery-3.2.1.min.js"></script>
    <script src="../../js/JqueryValidate.js"></script>
    <script src="../Ajax/pagar_manual.js"></script>
    <script src="../Ajax/pro_pagar.js"></script>
    <link rel="icon" href="../../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php
  include "Header_cliente.php";
  $idcli=$datos['id_cliente'];

  $sql=$conexion->prepare("SELECT * FROM pagos WHERE id_pago=:p AND id_cli_pa=:idc AND id_trans_pa=:idt");
  $sql->execute(array(
  	":p"=>$id_pago,
  	":idc"=>$idcli,
  	":idt"=>$id_transportista));
  
  $result=$sql->fetchAll();
  
?>
<!--|****************************
          SLIDESHOW
*******************************|-->

    <hr class="section-heading-spacer">
    <br>
    <br>
	<div class="container">
	<div class="row">
	<div class="col-lg-7">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Visualizar pago</h3>
	<br>
	<table class ="table table-responsive table-striped table-bordered table-hover" >
 	     <thead>
 	     <tr>
 	     <th>Monto</th>
 	     <th>Detalles</th>
 	     <th>T de pago</th>
 	     <th>N ref</th>
 	     <th>Fecha</th>
 	     </tr>
 	     </thead>
 	     <tbody>
 	     <?php foreach ($result as $info):?>
 	     <tr>
 	     	<td><?php echo $info["monto"];?> BsF</td>
 	     	<td><?php echo $info["detalles"];?></td>
 	     	<td><?php echo $info["tipo_pago"];?></td>
 	     	<td><?php echo $info["nreferencia"];?></td>
 	     	<td><?php echo $info["fecha"];?></td>
 	     </tr>
 	 	<?php endforeach; ?>
		
 	    </tbody>
 	   </table>

 	   <br>
 	   <a href="./" class="btn btn-primary btn-block">Volver</a>
 	   <br><br>
		</div>
	</div>
	</div>
<br><br><br><br>
<?php include("../footer.php"); ?>
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

<?php include_once("../../modales.php"); ?>

<script src="../../js/validar.js"></script>
<script src="../../js/funciones.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>
