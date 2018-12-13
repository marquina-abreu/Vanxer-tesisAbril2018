<?php
include ("../pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);
/*=======================================
      id traido por get de la zona                        
=======================================*/
$id_select=$_GET["id_cli"];

$consul= $conexion->prepare("SELECT * FROM clientes WHERE id_cliente=:id");

$consul->execute(array(
	":id"=>$id_select));
$resultado_cli= $consul->fetchAll();
$mod="";

foreach ($resultado_cli as $cli):
$mod.= "<div class='form-group'>";
              $mod.="<label>Nombre: </label>";
$mod.="<input type='text'  class='form-control' name='' id='nombre_edi' value='".$cli['nombre_cli']."'>";
         
         $mod.="</div>";
         $mod.= "<div class='form-group'>";
              $mod.="<label>Apellido:</label>";
			  $mod.="<input type='text' class='form-control' id='apellido_edi' value='".$cli['apellido_cli']."' name=''>";
         
        $mod.="</div>";
         $mod.="<div class='form-group'>";
              $mod.="<label>Correo:</label>";
			  $mod.="<input type='text' class='form-control' id='correo_edi' value='".$cli['correo']."' name=''>";
         
          $mod.="</div>";
          $mod.="<div class='form-group'>";
             $mod.="<label>Telefono:</label>";
			  $mod.="<input type='text' class='form-control' id='telefono_edi' value='".$cli['telefono']."' name=''>";
          $mod.="</div>";
          $mod.="<input type='hidden' value='".$id_select."' id='id_cli_edi'>"; 
        
endforeach;

echo $mod;
          


?>
