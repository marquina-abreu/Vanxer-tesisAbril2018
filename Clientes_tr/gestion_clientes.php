<?php

include ("../pdo_conexion.php");

include("config_base.php");
include("functions.php");

error_reporting(E_ERROR | E_PARSE); 


?>
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
	<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css">
	<script src="../jq/jquery-3.2.1.min.js"></script>
    <script src="../js/JqueryValidate.js"></script>    
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
    <script src="../Ajax/editar_info_cli.js"></script>
    <script src="../Ajax/borrar_cli.js"></script>
    <script src="../Ajax/aplicar_cambios_cli.js"></script>
</head>
<body>
<?php require "header_transportista.php"; ?>
<?php 
$resul= obtener_clientes_trans($blog_config["post_por_pagina"],$id_transportista,$conexion);
if (empty($resul)) {
	$nohay="<label class='lead text-danger'>No hay Clientes Suscritos <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
?>
	<br/><br/><br>
  <a id="mos_cli"></a>	 

<a  id="clientes" ></a>
<section class="container">
 <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Gestionar Clientes</h3>
 <hr class="section-heading-spacer">
          <div class="row">
             <div class="col-lg-6 col-md-10 col-xs-12 col-sm-12">
		<form name="busqueda" action="buscador_cli.php#busqueda" method="GET">
		<div class="form-group">
		<input type="text" name="busqueda" placeholder="Buscar Clientes por nombre o apellido" class="form-control col-lg-4 col-xs-4">
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
		</div>
		
		</form>
 
                    <table class ="table table-striped table-bordered table-hover table-responsive" id="tabla">
 	                   <thead>
 	                   <tr>
 	                   <th>Nombre</th>
 	                   <th>Apellido</th>
 	                   <th>Telefono</th>
 	                   <th>Mas</th>
 	                   </tr>
 	                   </thead>
 	                   <tbody>
 	                   <?php foreach ($resul as $cliente):?>
 	                   	<tr>
 	                   		<td><?php echo $cliente["nombre_cli"] ?></td>
 	                   		<td><?php echo $cliente["apellido_cli"] ?></td>
 	                   		<td><?php echo $cliente["telefono"] ?></td>
 	                   		<td>
						<li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret"></span></a>
			              <ul class="dropdown-menu" role="menu">
				           <li><a href="#edit_cli" data-toggle="modal" id="<?php echo $cliente["id_cliente"] ?>" onclick="mostrar_info(this.id)">Editar cliente</a></li>
				           <li><a href="#confirm_gestion" id="<?php echo $cliente["id_cliente"] ?>" onclick="borrar_cli(this.id)" data-toggle="modal">Borrar cliente</a></li>
			              </ul></li></td>
 	                   	</tr>

 	                   <?php endforeach; ?>
 	                  </tbody>
 	                 </table>
 	                 <?php echo $nohay;?>
 	                 <?php 
 	                 if (!empty($resul)) {
 	                 echo "<form action='reporte_pdf_clientes/reporte_lista_cli.php' method='POST' target='_blank'>";
 	                 echo "<input type='hidden' name='sd' value='".$id_transportista."'>";
 	                 echo "<button type='submit' class='btn btn-default btn-block'>Imprimir Lista</button>";
 	                 echo "</form>";
 	                 echo"<br>";
 	                 ?>
 	                 <a href="./" class="btn btn-primary btn-block">Volver</a>
 	                 <br>
 	                 <?php
 	                 	include("paginacion_clientes_crud.php"); }
 	                 	  ?>
 	                 
 	                 
             </div>
          </div>

	
</section>

<br><br><br><br>
<?php include_once("../footer.php");?>
<!--REDES SOCIALES -->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="#" class="icon icon-facebook2"></a></li>
    <li><a href="#" class="icon icon-instagram"></a></li>
    <li><a href="#" class="icon icon-twitter"></a></li>
    <li><a href="#" class="icon icon-google-plus3"></a></li>
</ul>
</div>

<?php include_once("../modales.php"); ?>
<script src='https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js'></script>
<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>