<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_tur=$_GET["id_tur"]; 
$id_trans=$_GET["id_trans"];

$consul= $conexion->prepare("SELECT * FROM turnos WHERE id_turno=:id");

$consul->execute(array(
  ":id"=>$id_tur));
$resultado_tur= $consul->fetch();

$mod="";

$mod.="<center><label class='alert alert-danger'>Estas Seguro de Borrar el Turno : '".$resultado_tur['nombre_tur']."'?<br>Todos los Clientes registrados y operaciones se perderan.</label></center>";
$mod.="<center><h1 class='text-danger'><span class='glyphicon glyphicon-exclamation-sign'></span></h1></center>";
$mod.="<center>";
$mod.= "<a href='turno_borrado.php?tb=".$id_tur."&idtr=".$id_trans."' class='btn btn-primary'>Aceptar</a>";
$mod.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$mod.="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
$mod.="</center>";


echo $mod;
          


?>
