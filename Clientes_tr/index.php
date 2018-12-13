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
	<script src="../jq/jquery-3.2.1.min.js"></script>
    <script src="../js/JqueryValidate.js"></script>    
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "header_transportista.php"; ?>
<?php 
$resul= obtener_clientes_trans($blog_config["post_por_pagina"],$id_transportista,$conexion);
if (empty($resul)) {
	$nohay="<br><br><label class='lead text-danger'>No hay Clientes Suscritos <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
?>

    <div class="container">
	<h2 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Clientes</h2>
	</div>
    <hr class="section-heading-spacer">
	<section class="container"><center><img src="../imagenes/Logo_vanxer2.png" class="img-responsive"></center></section>
	<br/><br/>
  <a id="mos_cli"></a>
  <div class="container">
  <div class="row">
  <div class="col-lg-4 col-xs-12">
  <h2 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Total de Clientes</h2>
  <br> 
   <div class="contenedor">
                  <section class="clientes">
                  <div class="panel panel-danger">
                   <div class="panel-heading">
                    <div class="page-heading"><h4 class="section-heading">Clientes Suscritos</h4>
                    </div>
                    </div>
                    <ul>
                    <?php echo $nohay;?>
                      <?php foreach ($resul as $cliente): ?>
                        <li><p><?php echo $cliente['nombre_cli']." ".$cliente["apellido_cli"]?></p></li>
                          
                      <?php endforeach; ?>
                    </ul>
                    </div>
                  </section>
                    </div> 
         <?php
         if (!empty($resul)) { 
         include("paginacion_clientes.php"); 
         }?>
   <a href="gestion_clientes.php" class="btn btn-default btn-block">Gestionar Clientes</a>
   <br>
   <a href="../index_transportista.php" class="btn btn-primary btn-block">Volver</a>
  </div>                    
  </div>
  </div>
	 
                <br>


<br><br><br>
<?php include_once("../footer.php"); ?>
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

<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../Ajax/Gestion_clientes.js"></script>
</body>
</html>