<?php 
include ("../pdo_conexion.php");
error_reporting(E_ERROR | E_PARSE);

$id_zona=$_POST["id_zona"];
$nombre_zona= $_POST["nombre_zona"];
$direc= $_POST["direcc_zona"];
$parroquia= $_POST["parroquia"];


$cons= $conexion->prepare("UPDATE zona SET nombre_zona=:nombre, direccion_zona=:direc, parroquia=:parro WHERE id_zona=:id");

$cons->execute(array(
	":id"=>$id_zona,
	":nombre"=>$nombre_zona,
	":direc"=>$direc,
	":parro"=>$parroquia));

echo "<label class='text-success'>Zona Editada con Exito</label>";

echo "<script>window.location='index.php';</script>";

?>