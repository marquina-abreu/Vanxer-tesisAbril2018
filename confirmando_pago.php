<?php 
include_once("pdo_conexion.php");

$id_pago=$_POST["id_pago"];

$sql=$conexion->prepare("SELECT estado_pago FROM pagos WHERE id_pago=:id");
$sql->execute(array(":id"=>$id_pago));
$estado=$sql->fetch();
$estado=$estado["estado_pago"];


if ($estado==1) {
	$estado_desac=0;
	
	$upda= $conexion->prepare("UPDATE pagos SET estado_pago =:estado WHERE id_pago=:id_p");
	$upda->execute(array(":estado"=>$estado_desac,":id_p"=>$id_pago));

	echo '<td id="escam"><button class="btn btn-info" title="Confirmar pago" onclick="camb('.$id_pago.')" >Confirmado <span class="glyphicon glyphicon-ok"></span></button></td>';
	
	
}
if ($estado==0) {
	$estado_desac=1;
	$upda= $conexion->prepare("UPDATE pagos SET estado_pago =:estado WHERE id_pago=:id_p");
	$upda->execute(array(":estado"=>$estado_desac,":id_p"=>$id_pago));

	echo '<td id="escam"><button class="btn btn-default" title="Confirmar pago" onclick="camb('.$id_pago.')" >Ok <span class="glyphicon glyphicon-ok"></span></button></td>';

}

header("location:pagos/realizados/#sdd");


?>