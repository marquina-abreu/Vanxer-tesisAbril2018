<?php 
error_reporting(E_ERROR | E_PARSE);
include_once("../../../pdo_conexion.php");

$nref=$_POST["nref"];
$tpago=$_POST["tpago"];
$detalles=$_POST["detalles"];
$idcli=$_POST["idcli"];
$idtur=$_POST["idtur"];
$idtra=$_POST["idtra"];
//saber monto
$sqlmon=$conexion->prepare("SELECT costo FROM trans_turno WHERE transportista=:trans AND turno=:idtur");
$sqlmon->execute(array(":trans"=>$idtra,":idtur"=>$idtur));
$res=$sqlmon->fetch();
$res=$res["costo"];
//buscar turno 
$sqltur=$conexion->prepare("SELECT nombre_tur FROM turnos WHERE id_turno=:idtur");
$sqltur->execute(array(":idtur"=>$idtur));
$n_tur=$sqltur->fetch();
$n_tur=$n_tur["nombre_tur"];
if ($n_tur!==false) {
	$sql=$conexion->prepare("INSERT INTO pagos (id_pago,monto,detalles,tipo_pago,nreferencia,turno_pa,id_cli_pa,id_trans_pa)VALUES(null,:monto,:deta,:tipo,:nref,:turno,:id_cli,:id_trans)");
	$sql->execute(array(
		":monto"=>$res,
		":deta"=>$detalles,
		":tipo"=>$tpago,
		":nref"=>$nref,
		":turno"=>$n_tur,
		":id_cli"=>$idcli,
		":id_trans"=>$idtra));

	if ($sql!==false) {
		header("location:../exitoso/");
	}else {
		echo "<label class='alert alert-danger'>Ha ocurrido un error al registrar</label>";
	}

}



?>
