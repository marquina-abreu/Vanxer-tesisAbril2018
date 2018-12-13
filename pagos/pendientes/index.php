<?php
include_once '../../pdo_conexion.php';
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
    <script src="Ajax/registro_turno_trans.js"></script>
    <script src="Ajax/eliminar_turno.js"></script>
    <link rel="icon" href="../../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "../header_transportista.php"; ?>
<?php
$fecha_ini_mes= date('Y-m');
  $sqlp=$conexion->query("SELECT * FROM pagos RIGHT JOIN clientes ON clientes.id_cliente=pagos.id_cli_pa WHERE pagos.id_trans_pa=$id_transportista AND pagos.fecha LIKE'$fecha_ini_mes%'");
  $pagos= $sqlp->fetchAll();


$nohay="";
if (empty($pagos)) {
  $nohay.="<br><br><label class='lead text-danger'>No tiene Pagos realizados <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
 ?>

<br/><br/><br>
    <div class="container">
    <div class="row">
    <div class="col-lg-7">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Pagos pendientes</h3>
    <br><br>
    <table class ="table table-striped table-bordered table-hover table-responsive" id="tabla">
                       <thead>
                       <tr>
                       <th>Nombre</th>
                       <th>Apellido</th>
                       <th>Turno</th>
                       <th>Telefono</th>
                       <th>Mas</th>
                       </tr>
                       </thead>
                       <tbody>
                      <?php foreach ($pagos as $pago):?>
                        <tr>
                            <td><?php echo $pago["nombre_cli"]?></td>
                            <td><?php echo $pago["apellido_cli"]?></td>
                            <td><?php echo $pago["turno_pa"]?></td>
                            <td><?php echo $pago["telefono"]?></td>
                            <td>
                        <li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                           <li><a href="#edit_cli" data-toggle="modal" id="" onclick="mostrar_info(this.id)">Editar cliente</a></li>
                           <li><a href="#confirm_gestion" id="" onclick="borrar_cli(this.id)" data-toggle="modal">Borrar cliente</a></li>
                          </ul></li></td>
                        </tr>
                    <?php endforeach; ?>
                      </tbody>
                     </table>
    </div>
    </div>
	</div>
    <hr class="section-heading-spacer">
	

<br><br><br><br>
<?php include_once("../../footer.php");?>
<!--REDES SOCIALES -->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="#" class="icon icon-facebook2"></a></li>
    <li><a href="#" class="icon icon-instagram"></a></li>
    <li><a href="#" class="icon icon-twitter"></a></li>
    <li><a href="#" class="icon icon-google-plus3"></a></li>
</ul>
</div>

<?php include_once("../../modales.php"); ?>

<script src="../../js/validar.js"></script>
<script src="../../js/funciones.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>