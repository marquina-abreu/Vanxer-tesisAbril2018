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
  
  $sql2=$conexion->query("SELECT costo FROM trans_turno WHERE transportista=$id_transportista");
  $costo=$sql2->fetch();

  $sql=$conexion->prepare("SELECT id_turno, nombre_tur, hora_recogida, hora_busqueda FROM turnos INNER JOIN cliente_turno on turnos.id_turno=cliente_turno.turno_cli WHERE cliente_turno.cliente=:id");
  $sql->execute(array(
  	":id"=>$datos["id_cliente"]));
  $turnos=$sql->fetchAll();
?>

	<br/>
    <br>
	<div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Turnos Inscritos</h3>
	<hr class="section-heading-spacer">
	<div class="row">
		<div class="col-lg-9 col-md-12">
		<table class ="table table-responsive table-striped table-bordered table-hover" >
 	     <thead>
 	     <tr>
 	     <th>Nombre</th>
 	     <th>Busqueda</th>
 	     <th>Regreso</th>
 	     <th>C.mensual</th>
 	     <th>D.de Pago</th>
 	     <th>Mas</th>
 	     </tr>
 	     </thead>
 	     <tbody>
		<?php foreach ($turnos as $turno):?>
			<?php
			$sql2=$conexion->prepare("SELECT costo, dia_pago FROM trans_turno WHERE transportista=:idt AND turno=:turno");
			$sql2->execute(array(":idt"=>$id_transportista,":turno"=>$turno["id_turno"]));
			$costo=$sql2->fetch();
 	     	?>
 	      <tr>
 	       <td><?php echo $turno["nombre_tur"] ?></td>
 	       <td><?php echo $turno["hora_recogida"] ?></td>
 	       <td><?php echo $turno["hora_busqueda"] ?></td>
 	       <td><?php echo $costo["costo"]." BsF" ?></td>
 	       <td><?php echo $costo["dia_pago"]." cada mes"?></td>
 	       <td><form action="clientes_turno.php" method="POST">
					<input type="hidden" value="<?php echo $turno["id_turno"]?>" name="idtt">
					<button type="submit" title="Clientes inscritos" class="btn btn-default"><span class="glyphicon glyphicon-user"></span></button>
				</form></td>
 	      </tr>

		<?php endforeach; ?>
 	    </tbody>
 	   </table>
 	   <br>
 	   <a href="" class="btn btn-default btn-block">Solicitar nuevo turno</a>
 	   <br>
 	   <a href="./" class="btn btn-primary btn-block">Volver</a>
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
