<?php 
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id=json_decode($_GET["n"]);

$sql=$conexion->query("SELECT * FROM solicitudes WHERE id_solicitud =$id");
$res=$sql->fetch();






require_once("Views/crear_codigo_view.php");

?>