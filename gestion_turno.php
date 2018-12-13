<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE); 



$consul_turnos= $conexion->prepare("SELECT * FROM turnos ");
$consul_turnos->execute();
$resultado= $consul_turnos->fetchAll();






require_once ("Views/gestion_turno_view.php");


?>