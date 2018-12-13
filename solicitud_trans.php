<?php
include ("pdo_conexion.php");
error_reporting(E_ERROR | E_PARSE);

$consul_zona= $conexion->prepare("SELECT * FROM zona");
$consul_zona->execute();
$resul_zona=$consul_zona->fetchAll();




require_once("Views/solicitud_trans_view.php");

?>