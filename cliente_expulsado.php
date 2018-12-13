<?php

include_once("pdo_conexion.php");

$cli=$_GET["cex"];
$ctur=$_GET["ctur"];

$cons=$conexion->prepare("DELETE FROM cliente_turno WHERE cliente =:idc AND turno_cli=:idt");

$cons->execute(array(":idc"=>$cli,":idt"=>$ctur));


header("location:turno_abierto.php?id_turno=".$ctur);




?>