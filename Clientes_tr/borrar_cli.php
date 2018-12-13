<?php
include ("../pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_select=$_GET["id_cli"]; 

$consul= $conexion->prepare("SELECT * FROM clientes WHERE id_cliente=:id");

$consul->execute(array(
  ":id"=>$id_select));
$resultado_cli= $consul->fetch();

$mod="";

$mod.="<input type='hidden' value='".$id_select."' id='id_cli_borrar'>";
$mod.="<center><label class='alert alert-danger'>Estas Seguro de Borrar a: ".$resultado_cli['nombre_cli'].' '.$resultado_cli['apellido_cli']."?<br> Todos sus datos y registros seran borrados</label></center>";
$mod.="<center><h1 class='text-danger'><span class='glyphicon glyphicon-exclamation-sign'></span></h1></center>";
$mod.="<center>";
$mod.= "<a href='cliente_borrado.php?cb=".$id_select."' class='btn btn-primary'>Aceptar</a>";
$mod.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$mod.="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
$mod.="</center>";


echo $mod;
          


?>
