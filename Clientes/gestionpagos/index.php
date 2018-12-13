<?php
include_once("../../pdo_conexion.php");
include "../config_base.php";
include "../functions.php";
function mes($mes_) { 
	$timestamp= strtotime($mes_); 
	$meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	$mes= date("m",$timestamp) - 1; 
	
	$mes_ = $meses[$mes];
	return $mes_;
}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  //aviso de empezar a pagar
  	$fecha_ini_mes= date('Y-m');
  	$mes=mes(date('Y-m'));
	$sqlp=$conexion->query("SELECT * FROM pagos WHERE id_trans_pa=$id_transportista AND id_cli_pa=$idcli AND fecha LIKE'$fecha_ini_mes%'");
	$pagos_solvente= $sqlp->fetchAll();
	$msj_chequ="";
	if ($pagos_solvente) {
		foreach ($pagos_solvente as $pagos) {
			$msj_chequ.="<br><br><label class='alert alert-info'>Usted se encuentra solvente por el mes ".$mes." por el turno ".$pagos["turno_pa"]."</label>";
		}
	}else{

		$msj_chequ.="<br><label class='alert alert-danger'>Usted no ha realizado el pago por el mes ".$mes." <span class='glyphicon glyphicon-exclamation-sign'></span></label>";
	}


  $sql=$conexion->prepare("SELECT id_turno, nombre_tur, hora_recogida, hora_busqueda FROM turnos INNER JOIN cliente_turno on turnos.id_turno=cliente_turno.turno_cli WHERE cliente_turno.cliente=:id");
  $sql->execute(array(
  	":id"=>$datos["id_cliente"]));
  $turnos=$sql->fetchAll();
?>
<!--|****************************
          SLIDESHOW
*******************************|-->
    <br>
    <br>
	<div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Pagos pendientes</h3>
	<hr class="section-heading-spacer">
	<?php echo $msj_chequ; ?>
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Turnos Inscritos</h3>
	<hr class="section-heading-spacer">
	<div class="row">
		<div class="col-lg-9 col-md-12">
		<table class ="table table-responsive table-striped table-bordered table-hover" >
 	     <thead>
 	     <tr>
 	     <th>Nombre</th>
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

			$turno_nombre=$turno["nombre_tur"];
			$sql_pago=$conexion->query("SELECT * FROM pagos WHERE id_trans_pa=$id_transportista AND turno_pa='$turno_nombre' AND id_cli_pa=$idcli AND fecha LIKE'$fecha_ini_mes%'");
			$pago_solvente= $sql_pago->fetch();
			$estado_pago=$pago_solvente["estado_pago"];
 	     	?>
 	      <tr>
 	       <td><?php echo $turno["nombre_tur"] ?></td>
 	       <td><?php echo number_format($costo["costo"],2,',','.')." BsF" ?></td>
 	       <td><?php echo $costo["dia_pago"]." cada mes"?></td>
 	       <td id="">
 	       <?php if($pago_solvente!=false){?>
 	       	<?php if($estado_pago==0){?>
 	       	<a href="ver_pago.php?idp=<?php echo $pago_solvente["id_pago"]?>" class='btn btn-default' title='Ver Pago' ><span class='glyphicon glyphicon-eye-open'></span></a> <a class='btn btn-warning' title='Pago en espera'><span class='glyphicon glyphicon-hourglass'></span></a>
 	       	<?php }else{
 	       		echo "<a href='ver_pago.php?idp=".$pago_solvente["id_pago"]."' class='btn btn-default' title='Ver Pago' ><span class='glyphicon glyphicon-eye-open'></span></a> <a class='btn btn-success' title='Pago cofirmado'><span class='glyphicon glyphicon-ok'></span></a>";
 	       	}?>
			<?php }else{?>
			<?php echo "<a href='' data-target='#metodo_pago' data-toggle='modal' onclick='pro_pagar(".$turno["id_turno"].",".$id_transportista.",".$datos["id_cliente"].")'  id='' class='btn btn-info'>Pagar <span class='fa fa-handshake-o'></span></a>"; 
			}
			?>
			</td>
 	      </tr>

		<?php endforeach; ?>
 	    </tbody>
 	   </table>
 	   <br>
 	   <a href="../" class="btn btn-primary btn-block">Volver</a>
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
