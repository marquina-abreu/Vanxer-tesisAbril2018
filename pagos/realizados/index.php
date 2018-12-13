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
    <link rel="icon" href="../../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "../header_transportista.php"; ?>
<?php
$fecha_ini_mes= date('Y-m');
  $sqlp=$conexion->query("SELECT * FROM pagos INNER JOIN clientes ON clientes.id_cliente=pagos.id_cli_pa WHERE pagos.id_trans_pa=$id_transportista AND pagos.fecha LIKE'$fecha_ini_mes%'");
  $pagos= $sqlp->fetchAll();

//saber la suma total de los ingresos 
$sqlsum=$conexion->query("SELECT SUM(monto) FROM pagos INNER JOIN clientes ON clientes.id_cliente=pagos.id_cli_pa WHERE pagos.id_trans_pa=$id_transportista AND estado_pago=1 AND pagos.fecha LIKE'$fecha_ini_mes%'");
  $total_acu= $sqlsum->fetch();


$nohay="";
if (empty($pagos)) {
  $nohay.="<br><br><label class='lead text-danger'>No tiene Pagos realizados <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
 ?>


<br/><br/><br>
   <div class="container">
    <div class="row">
    <div class="col-lg-7">
  <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Pagos realizados</h3>
  <hr class="section-heading-spacer">
    <br><br>
    <div id="sdd"></div>
    <table class ="table table-striped table-bordered table-hover table-responsive" id="tabla">
                       <thead>
                       <tr>
                       <th>Nombre</th>
                       <th>Apellido</th>
                       <th>Turno</th>
                       <th>Fecha</th>
                       <th>Telefono</th>
                       <th>N.Ref</th>
                       <th>Estado</th>
                       </tr>
                       </thead>
                       <tbody>
                      <?php foreach ($pagos as $pago):?>
                        
                        <tr>
                            <td><?php echo $pago["nombre_cli"]?></td>
                            <td><?php echo $pago["apellido_cli"]?></td>
                            <td><?php echo $pago["turno_pa"]?></td>
                            <td><?php echo $pago["fecha"];?></td>
                            <td><?php echo $pago["telefono"]?></td>
                            <td><?php echo $pago["nreferencia"]?></td>
                            <?php if($pago["estado_pago"]==0){ 
                             $estado="Ok";
                              ?>
                            <td >
                            <form action="../../confirmando_pago.php" method="POST">
                              <input type="hidden" name="id_pago" value="<?php echo $pago["id_pago"];?>"/>
                              <button type="submit" class="btn btn-default" title="Confirmar pago"><?php echo $estado;?><span class="glyphicon glyphicon-ok"></span></button>
                            </form>
                            </td>
                            <?php }else{
                              $estado="Confirmado";
                              ?>
                              <td >
                              <form action="../../confirmando_pago.php" method="POST">
                              <input type="hidden" name="id_pago" value="<?php echo $pago["id_pago"];?>"/>
                              <button type="submit" class="btn btn-info" title="Confirmar pago" ><?php echo $estado;?> <span class="glyphicon glyphicon-ok"></span></button>
                              </form>
                              </td>
                              <?php }?>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                     </table>
                     <br>
                     
                     <?php echo $nohay;?>
                     <br>
                     <?php if (empty($pagos)) {
                     
                      }else{ ?>
                        <div>
                       <h3>Total acomulado: <?php echo number_format($total_acu['SUM(monto)'],2,'.',',')?> BsF</h3>
                     </div>
                     <form action="reporte_pagos/" method="POST">
                      <input type="hidden" value="<?php echo htmlspecialchars(json_encode($pagos)); ?>" name="json_pagos">
                      <input type="hidden" value="<?php echo htmlspecialchars(json_encode($total_acu['SUM(monto)'])); ?>" name="aco">
                      <input type="submit" class="btn btn-default btn-block" value="Imprimir Lista" name="">
                     </form>
                     <?php } ?>
                     <br>
                     <a href="../../index_transportista.php" class="btn btn-primary btn-block">Volver</a>
    </div>
    </div>
  </div>
	

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