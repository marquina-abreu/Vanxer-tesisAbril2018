<?php 
include("../../pdo_conexion.php");

require 'FPDF/fpdf.php';

$id_transporte= $_POST["it"];
$id_tur= $_POST["itr"];

$con= $conexion->query("SELECT nombre_trans, apellido_trans FROM Transportistas WHERE id_transporte=$id_transporte");
$transportista=$con->fetch();

$con=$conexion->prepare("SELECT nombre_tur FROM turnos WHERE id_turno=:turno_se");
$con->execute(array(
	":turno_se"=>$id_tur));
$nombre_turno=$con->fetch();

$consul_turnos_cli= $conexion->prepare("SELECT clientes.* FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:id_trans_cli AND cliente_turno.turno_cli=:id_turno_cli");
$consul_turnos_cli->execute(array(
	":id_trans_cli"=>$id_transporte,
	":id_turno_cli"=>$id_tur));
$resultado_cli= $consul_turnos_cli->fetchAll();


$fpdf = new FPDF();
$fpdf -> AddPage("P","Letter",0);
$fpdf -> Image('Logo_vanxer2.png',10,7,60);
$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(200,10,utf8_decode('Total de Clientes del turno '.$nombre_turno['nombre_tur']), 1, 0, 'C');
$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(30,7,'Transportista:', 0, 0, 'L');
$fpdf -> Cell(40,7,$transportista['nombre_trans'].' '.$transportista['apellido_trans'], 0, 0, 'L');
$fpdf -> Ln(10);
$fpdf -> Cell(25,7,'Nombre', 1, 0, 'C');
$fpdf -> Cell(25,7,utf8_decode('Apellido'), 1, 0, 'C');
$fpdf -> Cell(70,7,'Correo', 1, 0, 'C');
$fpdf -> Cell(35,7,'Telefono', 1, 0, 'C');
$fpdf -> Cell(45,7,'F.Ingreso', 1, 0, 'C');
$fpdf -> SetFont("Arial", "I", 12);
 foreach ($resultado_cli as $cliente):
	$fpdf -> Ln(7);
$fpdf -> Cell(25,7,$cliente["nombre_cli"], 1, 0, 'C');
$fpdf -> Cell(25,7,$cliente["apellido_cli"], 1, 0, 'C');
$fpdf -> Cell(70,7,$cliente["correo"], 1, 0, 'C');
$fpdf -> Cell(35,7,$cliente["telefono"], 1, 0, 'C');
$fpdf -> Cell(45,7,$cliente["fecha_registro"], 1, 0, 'C');
endforeach;
$fpdf -> Ln(10);


$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Ln(20);
$fpdf -> Cell(200,10,utf8_decode('Todos los derechos reservados'), 1, 0, 'C');
$fpdf -> SetY(-15);
$fpdf -> SetFont("Times", "B", 24);
$fpdf -> Output("d");



?>