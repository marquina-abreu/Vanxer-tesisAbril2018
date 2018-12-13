<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../Style/style1.css">
	<link rel="stylesheet" type="text/css" href="../Style/Style_paginacion.css">
	<link rel="stylesheet"  href="../fonts.css">
	<script src="../jq/jquery-3.2.1.min.js"></script>
    <script src="../js/JqueryValidate.js"></script>
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php
  include "Header_cliente.php";
  $idt=$_POST["idtt"];
  $sql= $conexion->query("SELECT nombre_tur FROM turnos WHERE id_turno=$idt");
  $n_turno=$sql->fetch();
  
  $sql2=$conexion->query("SELECT nombre_cli,apellido_cli,fecha_registro,telefono,imagen_cli FROM clientes inner join cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE id_trans_cli=$id_transportista and cliente_turno.turno_cli=$idt");
  $clientes=$sql2->fetchAll();

?>
<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br><br>
	<div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Clientes suscritos (<?php echo $n_turno["nombre_tur"]?>)</h3>
  <hr>
	<div class="row">
		<div class="col-lg-9 col-md-12">
		<table class ="table table-responsive table-striped table-bordered table-hover" >
 	     <thead>
 	     <tr>
 	     <th>Nombre</th>
 	     <th>Apellido</th>
 	     <th>Telefono</th>
 	     <th>F. Ingreso</th>
 	     </tr>
 	     </thead>
 	     <tbody>
		<?php foreach ($clientes as $cliente):?>
 	      <tr>
 	       <td><?php echo $cliente["nombre_cli"] ?></td>
 	       <td><?php echo $cliente["apellido_cli"] ?></td>
 	       <td><?php echo $cliente["telefono"] ?></td>
 	       <td><?php echo fecha($cliente["fecha_registro"]) ?></td>
 	      </tr>

		<?php endforeach; ?>
 	    </tbody>
 	   </table>
 	   <a href="./turnos.php" class="btn btn-primary btn-block">Volver</a>
 	   <br><br>
		</div>
	</div>
	</div>
 <br><br><br>
<?php include("footer.php"); ?>
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

<?php include_once("../modales.php"); ?>

<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
