<?php

include_once("pdo_conexion.php");

$id_coment=$_GET["idcom"];
$idnoti=$_GET["idn"];

$sql=$conexion->query("DELETE FROM comentarios WHERE id_coment=$id_coment");

header("location:noticia_abierta_trans.php?id=".$idnoti);

?>