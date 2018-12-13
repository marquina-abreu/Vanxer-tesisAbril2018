<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);
$zona_selec=$_GET["c"];


$consul_trans= $conexion->prepare("SELECT transportistas.* FROM transportistas INNER JOIN zona ON zona.id_zona=transportistas.id_zona_trans WHERE transportistas.id_zona_trans=:zona_tomada");
$consul_trans->execute(array(
	":zona_tomada"=>$zona_selec));
$resul_trans= $consul_trans->fetchAll();
echo "<select class='form-control' name='vanero' id='vanero_' onchange='mostrar_turno(this.value)'>";
echo "<option value='ninguno' selected disabled>Seleccione un Transportista</option>";
    foreach ($resul_trans as $vanero):
    echo "<option value='".$vanero['id_transporte']."'>".$vanero['nombre_trans']." ".$vanero['apellido_trans']."</option>";
    endforeach;
    echo "</select>";
                    

?>