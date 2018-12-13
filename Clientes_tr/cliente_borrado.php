<?php
include ("../pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_select=$_GET["cb"];

$chequeo= $conexion->prepare("SELECT id_usuario FROM usuarios WHERE usuario= :usu");
$chequeo->execute(array(
	":usu"=>$id_select));

$resultado_id=$chequeo->fetch();
$id_usuario=$resultado_id["0"];

$cons1=$conexion->prepare("DELETE FROM cliente_turno WHERE cliente =:id");

$cons1->execute(array(":id"=>$id_select));

$cons2=$conexion->prepare("DELETE FROM clientes WHERE id_cliente =:id_");

$cons2->execute(array(":id_"=>$id_select));

$cons3=$conexion->prepare("DELETE FROM usuarios WHERE id_usuario = id_usu");

$cons3->execute(array(":id_usu"=>$id_usuario));

header("location:gestion_clientes.php");






?>