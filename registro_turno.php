<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE); 



if (!empty($_POST["turno_id"])) {
	if(empty($_POST["costo"])){
		echo "<div class='container'><p class='text-danger'>INGRESE UN MONTO!<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
		return;
	}
	if(empty($_POST["dia_pag"])) {
		echo "<div class='container'><p class='text-danger'>INGRESE UN DIA DE COBRO!<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
		return;
	}


$turno=$_POST["turno_id"];
$transporte=$_POST["id_transporte_turno"];
$costo=$_POST["costo"];
$dia_pag=$_POST["dia_pag"];





$Chequeo= $conexion->prepare("SELECT * FROM trans_turno WHERE transportista=:trans AND turno=:turno LIMIT 1"); 
$Chequeo->execute(array(
	":trans"=>$transporte,
	":turno"=>$turno));
$existe=$Chequeo->fetch();

if (empty($existe)) {
$registro= $conexion->prepare("INSERT INTO trans_turno (transportista,turno,costo,dia_pago) VALUES (:id,:id_turno,:costo,:dia)");

$registro->execute(array(
	":id"=>$transporte,
	":id_turno"=>$turno,
	":costo"=>$costo,
	":dia"=>$dia_pag));

echo "<div class='container'><p class='text-success'>TURNO AGREGADO CON EXITO <span class='glyphicon glyphicon-ok-sign'></span></p></div>";

echo"<script>window.location='gestion_turno.php';</script>";
}
else{

echo "<div class='container'><p class='text-danger'>¡TURNO YA INSCRITO!<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";

}
}

else{

echo "<div class='container'><p class='text-danger'>¡SELECCIONE UN TURNO!<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}


?>