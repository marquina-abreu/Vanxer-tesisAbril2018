<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);
function fecha($fecha) { 
  $timestamp= strtotime($fecha); 
  $meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

  $dia= date("d",$timestamp); 
  $mes= date("m",$timestamp) - 1; 
  $year= date("Y",$timestamp);

  $fecha = "$dia de ". $meses[$mes] ." del $year";
  return $fecha;
}

$id_select=$_GET["id_cli"];

$consul= $conexion->prepare("SELECT * FROM clientes WHERE id_cliente=:id");

$consul->execute(array(
	":id"=>$id_select));
$resultado_cli= $consul->fetch();
$mod="";

        $mod.="<label>Foto de perfil:</label>
                <center><img src='Clientes/foto_perfil/".$resultado_cli['imagen_cli']."' class='thumbnail' style='width:170px; height:140px;'></center>";
             $mod.="<label>Fecha de Suscripción:</label>";
        $mod.="<p class='text-success'>".fecha($resultado_cli['fecha_registro'])."</p>";

        $mod.="<label>Nombre:</label>";
        $mod.="<p class=''>".$resultado_cli['nombre_cli']."</p>";
         
         $mod.="<label>Apellido:</label>";
        $mod.="<p class=''>".$resultado_cli['apellido_cli']."</p>";

         $mod.="<label>Correo:</label>";
        $mod.="<p class=''>".$resultado_cli['correo']."</p>";

          $mod.="<label>Telefono:</label>";
        $mod.="<p class=''>".$resultado_cli['telefono']."</p>";
        

echo $mod;
          


?>
