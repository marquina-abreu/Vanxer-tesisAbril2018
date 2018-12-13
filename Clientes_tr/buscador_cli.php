<?php
include ("../pdo_conexion.php");

include("config_base.php");
include("functions.php");

$conexion = conexion_noticias($bd_config);

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
    <script src="../Ajax/editar_info_cli.js"></script>
    <script src="../Ajax/borrar_cli.js"></script>
    <script src="../Ajax/aplicar_cambios_cli.js"></script>
</head>
<body>
<?php require "header_transportista.php"; ?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET["busqueda"])) {
	$busqueda= limpiarDatos($_GET["busqueda"]);

	$consulta= $conexion->prepare("SELECT * FROM clientes  WHERE id_trans_cli=:id_tra AND (nombre_cli LIKE :busqueda OR apellido_cli LIKE :busqueda)");

	$consulta->execute(array(
		":id_tra"=>$id_transportista,
		":busqueda"=> "%$busqueda%"));

	$resultados=$consulta->fetchAll();

	if (empty($resultados)) {
		$buscador= "No se encontraron resultados de la busqueda: $busqueda";
	}
	else {
		$buscador= "Resultados de la busqueda: $busqueda";
	}

	
}
else {
	header("location:gestion_clientes.php#categoria_cliente_editar");
}
?>
<br><br/>
<!--slideshow-->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
		<div id="carousel-1" class="carousel slide" data-ride="carousel">
		<!--Indicadores..-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-1" data-slide-to="1"></li>
			<li data-target="#carousel-1" data-slide-to="2"></li>
			<li data-target="#carousel-1" data-slide-to="3"></li>
			<li data-target="#carousel-1" data-slide-to="4"></li>
			<li data-target="#carousel-1" data-slide-to="5"></li>
		</ol>
		<!--Contenedor de los Slie..-->
		<div class="carousel-inner" role="listbox">
		<!--Numero de item... imagenes..-->
			<div class="item active"> <!--AGREGUE ACTIVE PARA QUE SE ME VISUALICE EN LA PAGINA LAS IMAGENES..-->
				<img src="../imagenes/logo_vanxer_3.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Pensamos en tu seguridad..</h3>
					<h5 class="hidden-lg hidden-md">Pensamos en tu seguridad..</h5>
				</div>
			</div>

			<div class="item">
				<img src="../imagenes/urbe.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Transporte para URBE</h3>
					<h5 class="hidden-lg hidden-md">Transporte para URBE</h5>
				</div>
			</div>

			<div class="item">
				<img src="../imagenes/urbe1.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">100% resposables y confiables</h3>
					<h5 class="hidden-lg hidden-md">100% resposables y confiables</h5>
				</div>
			</div>

			<div class="item">
				<img src="../imagenes/Transporte2.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Pensamos en tu seguridad..</h3>
					<h5 class="hidden-lg hidden-md">Pensamos en tu seguridad..</h5>
				</div>
			</div>
			<div class="item">
				<img src="../imagenes/Transporte1.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Transporte para URBE</h3>
					<h5 class="hidden-lg hidden-md">Transporte para URBE</h5>
				</div>
			</div>
			<div class="item">
        <img src="../imagenes/mercado_vanxer.png" class="img-responsive">
        <div class="carousel-caption">
          <h3 class="hidden-xs hidden-sm">Realiza tus Pagos con MercadoPago</h3>
          <h5 class="hidden-lg hidden-md">Realiza tus Pagos con MercadoPago</h5>
        </div>
      </div>
		</div>
		<!--FLECHITAS PARA MOVER IMAGENES-->
		<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
		</a>

		<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Siguente</span>
		</a>

		</div>
		</div>
	</div>
	<br/><br/><br><br/>
    <div class="container">
	<h2 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Gestionar</h2>
	</div>
    <hr class="section-heading-spacer">
	<section class="container"><center><img src="../imagenes/Logo_vanxer2.png" class="img-responsive"></center></section>
	<br/><br/><br><br/>
  <a id="mos_cli"></a>	 
                <br>

<a  id="busqueda" ></a>
<section class="container">
<hr class="section-heading-spacer">
          <div class="row">
             <div class="col-lg-8 col-md-8 col-xs-8">
                <div class="clearfix"></div>
                  <h2 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Gestionar Clientes</h2>
                  <br>
                  <h3 class="post-title"><?php echo $buscador;?></h3>
                  <br>
                  <div id="wrapper">
                  <div class="">
		<form name="busquedaa" action="buscador_cli.php#busqueda" method="GET">
		<div class="form-group">
		<input type="text" name="busqueda" placeholder="Buscar Clientes por nombre o apellido" class="form-control col-lg-2">
		<button type="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		
		
		</form>
		</div>
 
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
 	                   <?php foreach ($resultados as $cliente):?>
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
 	                 <br>
 	                 <?php
 	                 if (!empty($resultados)) {
 	                  	include("paginacion_clientes_crud.php");
 	                  } ?>
 	                 
                  </div>
             </div>
          </div>

	
</section>

<style type="text/css">
@media (max-width: 414px) {
	.fot {
		width: 115%;
	}
}

</style>
<footer class="container-fluid fot" style="background: black; ">
       
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <center>
                    <ul class="list-inline" >
                        
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about" style="text-decoration:none;">@marquina_abreu</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                    </ul>
                 </center>
                    <center>
                    <p class="copyright text-muted small">Copyright &copy; Todos los derechos reservados 2017</p>
                    <p class="copyright text-muted small">Vanxer &copy</p>

                    </center>

                </div>
            </div>
         
    </footer>
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
</body>
</html>