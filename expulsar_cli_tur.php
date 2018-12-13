<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_cli=$_GET["id_cli"]; 
$id_tur=$_GET["id_tur"];

$consul= $conexion->prepare("SELECT nombre_cli,apellido_cli FROM clientes WHERE id_cliente=:id");

$consul->execute(array(
  ":id"=>$id_cli));
$resultado_cli= $consul->fetch();

$mod="";

$mod.="<input type='hidden' value='".$id_cli."' id='id_cli_borrar'>";
$mod.="<center><label class='alert alert-danger'>Estas Seguro de expulsar a: ".$resultado_cli['nombre_cli']." ".$resultado_cli['apellido_cli']."?<br>De este turno?.</label></center>";
$mod.="<center><h1 class='text-danger'><span class='glyphicon glyphicon-exclamation-sign'></span></h1></center>";
$mod.="<center>";
$mod.= "<a href='cliente_expulsado.php?cex=".$id_cli."&ctur=".$id_tur."' class='btn btn-primary'>Aceptar</a>";
$mod.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$mod.="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
$mod.="</center>";


echo $mod;
          


?>
