
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
	<link rel="stylesheet"  href="fonts.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="Ajax/Login.js"></script>
	<script src="Ajax/mostrar_comentario_solic.js"></script>
</head>
<body>
<?php include_once("header_transportista.php");?>

<?php 
$consul_solic=$conexion->prepare("SELECT * FROM solicitudes  WHERE id_trans_soli=:transportista ORDER BY id_solicitud DESC");
$consul_solic->execute(array(
	":transportista"=>$id_transportista));
$resultado=$consul_solic->fetchAll();
?>

    <br/><br/><br>
	
	<div class="container">
	<div class="row">
	<div class="col-lg-5">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Solicitudes de los Clientes</h3>
	<hr>
	
	 <table class ="table table-responsive table-striped table-bordered table-hover">
 	    <thead>
 	    <tr>
 	    <th>Nombre</th>
 	    <th>Apellido</th>
 	    <th>Telefono</th>
 	    <th>Correo</th>
 	    <th>Comentario</th>
 	    <th>Config</th>
 	    </tr>
 	    </thead>
 	    <tbody>
 	    <?php foreach ($resultado as $solicitud):?>
         <tr>
         	<td id="nombre_cli"><?php echo $solicitud["nombre_cl"]; ?></td>
         	<td id="apellido_cl"><?php echo $solicitud["apellido_cl"]; ?></td>
         	<td><?php echo $solicitud["telefono"]; ?></td>
         	<td><?php echo $solicitud["correo_soli"]; ?></td>
         	<td><a href="#vi_comentario" class="btn btn-primary" data-toggle="modal" id="<?php echo $solicitud["id_solicitud"];?>" onclick="mostrar_coment(this.id)">Leer</a></td>
         	<td><li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret">
			</span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a id="enviar_cod"  href="crear_codigo.php?n=<?php echo htmlspecialchars(json_encode($solicitud["id_solicitud"])); ?>">Crear codigo</a></li>
				<li><a href="borrar_solicitud_cliente.php?n=<?php echo $solicitud["nombre_cl"];?>&a=<?php echo $solicitud["apellido_cl"]; ?>&t=<?php echo $id_transportista?>">Rechazar</a></li>
			</ul></li></td>
         </tr>
         <?php endforeach; ?>
 	   </tbody>
 	  </table>
 	  <br>
	  </div>
	   <div class="visible-lg pull-right col-lg-3">
 	  	<img src="imagenes/atencioncliente3.png" class="img-responsive"/>
 	  </div>
	  </div>
	  <div class="row">
	  <div class="col-lg-6">
	  	<a href="clientes_verificados_solic.php" class="btn btn-default btn-block">Clientes Verificados</a>
	  	<br>
	  	<a href="index_transportista.php" class="btn btn-primary btn-block">Volver</a>
	  	
	  </div>
	  </div>
	  <br>
	 
	  </div>
<br/>

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
