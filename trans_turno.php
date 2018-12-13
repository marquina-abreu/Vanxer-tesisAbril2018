<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);
$trans_select=$_GET["id_tr"];

$sql=$conexion->query("SELECT capacidad FROM transportistas WHERE id_transporte=$trans_select");
$capacidad=$sql->fetch();
$capacidad=$capacidad["0"];
   


$consul_turno= $conexion->prepare("SELECT nombre_tur, hora_recogida, transportistas.capacidad, id_turno, hora_busqueda FROM turnos INNER JOIN trans_turno on turnos.id_turno=trans_turno.turno INNER JOIN transportistas on transportistas.id_transporte=trans_turno.transportista WHERE trans_turno.transportista=:id_trans");

$consul_turno->execute(array(
	":id_trans"=>$trans_select));
$result_turno=$consul_turno->fetchAll();


echo "<select class='form-control' name='turno_sele' id='turno_sele'>";
echo "<option value='ninguno' selected disabled >Seleccione un Turno</option>";
    foreach ($result_turno as $turno_tra):
    	
		$con_tur =$conexion->prepare("SELECT COUNT(*) FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:idt AND cliente_turno.turno_cli=:idtur");
		$con_tur->execute(array(":idt"=>$trans_select,":idtur"=>$turno_tra['id_turno']));
		$cant_cli=$con_tur->fetch();
		$cant_cli=$cant_cli["0"];
		
		
		if ($capacidad===$cant_cli) {
			$disponible="<label class='text-danger'>- FULL</label>";
		}else{
			$disponible="- Cupos Disponibles: ".($capacidad-$cant_cli);
		}

    echo "<option value='".$turno_tra['id_turno']."'>".$turno_tra['nombre_tur']." ".$disponible." </option>";
    endforeach;
    echo "</select>";
                    
?>