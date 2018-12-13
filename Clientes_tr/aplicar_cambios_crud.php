<?php 
include ("../pdo_conexion.php");
error_reporting(E_ERROR | E_PARSE);

$id_cli=$_POST["id_cli_edi"];
$nombre= $_POST["nombre_edi"];
$apellido= $_POST["apellido_edi"];
$correo= $_POST["correo_edi"];
$telefono= $_POST["telefono_edi"];

$cons= $conexion->prepare("UPDATE clientes SET nombre_cli=:nombre, apellido_cli=:apellido, correo=:correo, telefono=:telefono WHERE id_cliente=:id");

$cons->execute(array(
	":id"=>$id_cli,
	":nombre"=>$nombre,
	":apellido"=>$apellido,
	":correo"=>$correo,
	":telefono"=>$telefono));

echo "<label class='text-success'>Cliente Editado con Exito</label>";

echo "<script>window.location='gestion_clientes.php';</script>";

?>