<?php
include_once("pdo_conexion.php");
$nom=$_GET["n"];
$ape=$_GET["a"];
$trans=$_GET["t"];

$eli=$conexion->prepare("DELETE FROM solicitudes WHERE nombre_cl =:no AND apellido_cl=:ap AND id_trans_soli=:idt");

$eli->execute(array(
	":no"=>$nom,
	":ap"=>$ape,
	":idt"=>$trans
));

header("location:solictud_clientes.php");



?>