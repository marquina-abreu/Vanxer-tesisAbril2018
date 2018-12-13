<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_select=$_GET["id_cli"];

$consul= $conexion->prepare("SELECT coment FROM solicitudes WHERE id_solicitud=:id");

$consul->execute(array(
	":id"=>$id_select));
$resultado_cli= $consul->fetch();
$comentario=$resultado_cli;
$mod="";

$mod.= "<div class='form-group'>";
    $mod.="<textarea class='form-control'>".$comentario['coment']."</textarea>";
          $mod.="</div>";

echo $mod;
          


?>
