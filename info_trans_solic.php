<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$trans_select=$_GET["id_tr"];


$cons_t= $conexion->query("SELECT id_turno, nombre_tur FROM turnos INNER JOIN trans_turno on turnos.id_turno=trans_turno.turno WHERE trans_turno.transportista=$trans_select");
$turnos=$cons_t->fetchAll();



$consul_info= $conexion->prepare("SELECT * FROM transportistas  WHERE id_transporte=:id_trans");

$consul_info->execute(array(
	":id_trans"=>$trans_select));
$result_info=$consul_info->fetch();
$foto_perfil="";
$foto_van="";
$table="";
$table2="";
$table3="";
$mostrar="";


$foto_perfil.='<h3 class="section-heading hidden-xs"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Información del Transportista</h3>';
$foto_perfil.='<h4 class="section-heading visible-xs"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Información del Transportista</h4>';
$foto_perfil.="<hr>";
$foto_perfil.="<center><img src='perfil_trans/foto_vanero/".$result_info['foto_trans']."' class='thumbnail' style='width:260px; height:320px;'></center>";

$table.="<label>Nombre:</label> <p style='display:inline-block;'>".$result_info['nombre_trans']."</p><br>";
$table.="<label>Apellido:</label> <p style='display:inline-block;'>".$result_info['apellido_trans']."</p><br>";
$table.="<label>Correo:</label> <p style='display:inline-block;'>".$result_info['correo_trans']."</p><br>";
$table.="<label>Telefono:</label> <p style='display:inline-block;'>".$result_info['telefono_trans']."</p>";


echo $foto_perfil; 
echo $table;


$foto_van.="<center><img src='perfil_trans/foto_van/".$result_info['foto_van']."' class='thumbnail' style='width:260px; height:320px;'></center>";
$table2.="<h3 class='section-heading hidden-xs'><span class='glyphicon glyphicon-circle-arrow-right spa'></span> Informacion de la Van</h3>";
$table2.="<h4 class='section-heading visible-xs'><span class='glyphicon glyphicon-circle-arrow-right spa'></span> Informacion de la Van</h4>";
$table2.="<hr>";
$table2.="<table class ='table  table-bordered table-hover table-responsive'>";
$table2.="<thead>";
$table2.="<tr>";
$table2.="<th>Modelo</th>";
$table2.="<th>Capacidad</th>";
$table2.="<th>Placa</th>";
$table2.="</tr>";
$table2.="</thead>";
$table2.="<tbody>";

$table2.= "<tr>";
$table2.="<td>".$result_info['modelo']."</td>";
$table2.="<td>".$result_info['capacidad']."</td>";
$table2.="<td>".$result_info['placa']."</td>";
$table2.= "</tr>";

$table2.="</tbody>";
$table2.="</table>";


$table3.="<h3 class='section-heading hidden-xs'><span class='glyphicon glyphicon-circle-arrow-right spa'></span> Turnos Disponibles</h3>";
$table3.="<h3 class='section-heading visible-xs'><span class='glyphicon glyphicon-circle-arrow-right spa'></span> Turnos Disponibles</h3>";
$table3.="<hr>";
$table3.="<table class ='table   table-bordered table-hover table-responsive'>";
$table3.="<thead class='btn-primary'>";
$table3.="<tr>";
$table3.="<th>Turnos</th>";
$table3.="</tr>";
$table3.="</thead>";
$table3.="<tbody>";
foreach ($turnos as $turno):

$con_tur =$conexion->prepare("SELECT COUNT(*) FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:idt AND cliente_turno.turno_cli=:idtur");
$con_tur->execute(array(":idt"=>$trans_select,":idtur"=>$turno['id_turno']));
$cant_cli=$con_tur->fetch();
$cant_cli=$cant_cli["0"];

$diferencia="";
if ($result_info['capacidad']===$cant_cli) {
	$diferencia.="<label class='text-danger'>FULL</label>";
}
$table3.= "<tr>";
$table3.="<td>".$turno['nombre_tur']." - Inscritos: ".$cant_cli." de ".$result_info['capacidad']." ".$diferencia." </td>";
$table3.= "</tr>";
endforeach;
$table3.="</tbody>";
$table3.="</table>";


$mostrar.="<a href='#coment' class='btn btn-default btn-block' data-toggle='collapse'>Realizar Solicitud</a>";

echo $table2;
echo $foto_van; 
echo $table3;
echo $mostrar;

?>