<?php
include_once("pdo_conexion.php");
function fecha($fecha) { 
  $timestamp= strtotime($fecha); 
  $meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

  $dia= date("d",$timestamp); 
  $mes= date("m",$timestamp) - 1;
  $year= date("Y",$timestamp);

  $fecha = "$dia de ". $meses[$mes] ." del $year";
  return $fecha;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
	<link rel="stylesheet"  href="fonts.css">
  <link rel="stylesheet"  href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="Ajax/Login.js"></script>
    <script src="Ajax/registro_codi_verf.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php include_once("header_transportista.php");
$cons= $conexion->query("SELECT * FROM codigo_verif_cli WHERE id_trans=$id_transportista ORDER BY fecha_cod");
$resul=$cons->fetchAll();
?>

<br/><br><br/>
    <div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Clientes Verificados</h3>
	</div>
	<br><br>
	<div class="container">
	<div class="row">
	  <div class="col-lg-6 col-md-10 col-sm-11 col-xs-12 ">

      <form name="busqueda" action="buscador_cli.php#busqueda" method="GET">
    <div class="form-group">
    <input type="text" name="busqueda" placeholder="Buscar Clientes por nombre o apellido" class="form-control col-lg-4 col-xs-4">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
    </div>
    
    </form>
                   <table class ="table table-responsive table-striped table-bordered table-hover" id="tablaar">
                     <thead>
                     <tr>
                     <th>Codigo</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Fecha</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($resul as $cliente):?>
                      <tr>
                        <td><?php echo $cliente["id_codigo"] ?></td>
                        <td><?php echo $cliente["nombre"] ?></td>
                        <td><?php echo $cliente["apellido"] ?></td>
                        <td><?php echo fecha($cliente["fecha_cod"]) ?></td>
                      </tr>

                     <?php endforeach; ?>
                    </tbody>
                   </table>
           <br>
           <a href="solictud_clientes.php" class="btn btn-primary btn-block">Volver</a>
      </div> 
	  </div>
	  </div>
    <script type="text/javascript">
      $(document).ready( function () {
       $('#tablaar').DataTable();
      } );
    </script>
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
