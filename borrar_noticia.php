<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_noti=$_GET["id_noti"]; 

$consul= $conexion->prepare("SELECT * FROM noticias_trans WHERE id_noticia=:id");

$consul->execute(array(
  ":id"=>$id_noti));
$resultado_noti= $consul->fetch();

$mod="";

$mod.="<input type='hidden' value='".$id_noti."' id='id_cli_borrar'>";
$mod.="<center><label class='alert alert-danger'>Estas Seguro de Borrar la Publicacion: '".$resultado_noti['titulo_trans']."'?<br>Todos los comentarios hechos a esta noticia se perderan.</label></center>";
$mod.="<center><h1 class='text-danger'><span class='glyphicon glyphicon-exclamation-sign'></span></h1></center>";
$mod.="<center>";
$mod.= "<a href='noticia_borrada.php?nb=".$id_noti."' class='btn btn-primary'>Aceptar</a>";
$mod.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$mod.="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
$mod.="</center>";


echo $mod;
          


?>
