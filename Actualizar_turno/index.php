<?php 

include_once("../pdo_conexion.php");

$mensualidad= $_POST["mensu"];
$dia_pago=$_POST["dpagoo"];
$turno=$_POST["idturno"];
$trans=$_POST["idtrans"];


$upda= $conexion->prepare("UPDATE trans_turno SET costo =:costo, dia_pago=:pago WHERE transportista=:idtrans AND turno=:idtur");
$upda->execute(array(
	":costo"=>$mensualidad,
	":pago"=>$dia_pago,
	":idtrans"=>$trans,
	":idtur"=>$turno));

header("location:/transporte/gestion_turno.php");



?>