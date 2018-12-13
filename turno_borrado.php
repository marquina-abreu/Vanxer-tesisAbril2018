<?php

include_once("pdo_conexion.php");

$id_turno=$_GET["tb"];
$idtrans=$_GET["idtr"];// id del transportista



$cons=$conexion->query("DELETE FROM trans_turno WHERE transportista=$idtrans AND turno=$id_turno");

$sql=$conexion->query("SELECT id_cliente FROM clientes INNER JOIN cliente_turno ON clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=$idtrans AND cliente_turno.turno_cli=$id_turno");
$clientes=$sql->fetchAll();



foreach ($clientes as $cliente):
	
$cons2=$conexion->prepare("DELETE FROM cliente_turno  WHERE (cliente=:idcli AND turno_cli=:idtur)");
$cons2->execute(array(":idcli"=>$cliente["id_cliente"],":idtur"=>$id_turno));

endforeach;

header("location:gestion_turno.php#turnoss");
