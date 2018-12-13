<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE); 


$turno_selec=$_GET["id_turno"];




require_once ("Views/turno_abierto_view.php");





?>