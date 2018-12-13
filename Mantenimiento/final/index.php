<?php
include_once ("../../pdo_conexion.php");
$idtra=$_POST["idtra"];

$aceite=$_POST["aceite"];

$resp1=$_POST["resp1"];
$fecha_res1=$_POST["res_fe_1"];

$resp2=$_POST["resp2"];
$fecha_res2=$_POST["res_fe_2"];

$resp3=$_POST["resp3"];
$fecha_res3=$_POST["res_fe_3"];

$resp4=$_POST["resp4"];
$fecha_res4=$_POST["res_fe_4"];

$sql=$conexion->prepare("INSERT INTO mantenimiento (id_mantenimiento,cam_aceite,resp1,fecha_1_dia,resp2,fecha_2_dia,resp3,fecha_3_dia,resp4,fecha_4_dia,id_transpor) VALUES (null,:aceite,:resp1,:fe1,:resp2,:fe2,:resp3,:fe3,:resp4,:fe4,:idt)");
$sql->execute(array(
	":aceite"=>$aceite,
	":resp1"=>utf8_encode($resp1),
	":fe1"=>$fecha_res1,
	":resp2"=>utf8_encode($resp2),
	":fe2"=>$fecha_res2,
	":resp3"=>utf8_encode($resp3),
	":fe3"=>$fecha_res3,
	":resp4"=>utf8_encode($resp4),
	":fe4"=>$fecha_res4,
	":idt"=>$idtra));

if ($sql!=false) {
	header("location:../exitoso/");
}
?>