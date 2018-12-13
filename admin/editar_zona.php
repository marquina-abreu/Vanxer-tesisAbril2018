<?php
include ("../pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_zona=$_GET["id_zona"];

$consul= $conexion->prepare("SELECT * FROM zona WHERE id_zona=:id");

$consul->execute(array(
	":id"=>$id_zona));
$result_zona= $consul->fetchAll();
$mod="";

foreach ($result_zona as $zona):
$mod.= "<div class='form-group'>";
              $mod.="<label>Nombre: </label>";
$mod.="<input type='text'  class='form-control' name='' id='nombre_zoid' value='".$zona['nombre_zona']."'>";
         
         $mod.="</div>";
         $mod.= "<div class='form-group'>";
              $mod.="<label>Descripción:</label>";
			  $mod.="<input type='text' class='form-control' id='des_id' value='".$zona['direccion_zona']."' name=''>";
         
        $mod.="</div>";
         $mod.="<div class='form-group'>";
              $mod.="<label>Parroquia:</label>";
			  $mod.="<input type='text' class='form-control' id='parr_id' value='".$zona['parroquia']."' name=''>";
         
          $mod.="</div>";
          $mod.="<input type='hidden' value='".$id_zona."' id='id_zona_traida'>";
        
endforeach;

echo $mod;
          


?>
