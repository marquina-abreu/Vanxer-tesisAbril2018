<?php 
include("../../pdo_conexion.php");

require 'FPDF/fpdf.php';

$id= $_POST["sd"];
$con= $conexion->query("SELECT nombre_trans, apellido_trans FROM Transportistas WHERE id_transporte=$id");
$transportista=$con->fetch();
$cons= $conexion->prepare("SELECT * FROM clientes WHERE id_trans_cli=:id");

$cons->execute(array(":id"=>$id));
$resultado=$cons->fetchAll();


$fpdf = new FPDF();
$fpdf -> AddPage("P","Letter",0);
$fpdf -> Image('Logo_vanxer2.png',10,7,60);
$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(200,10,utf8_decode('Total de Clientes'), 1, 0, 'C');
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
 foreach ($resultado as $cliente):
	$fpdf -> Ln(7);
$fpdf -> Cell(25,7,$cliente["nombre_cli"], 1, 0, 'C');
$fpdf -> Cell(25,7,$cliente["apellido_cli"], 1, 0, 'C');
$fpdf -> Cell(70,7,$cliente["correo"], 1, 0, 'C');
$fpdf -> Cell(35,7,$cliente["telefono"], 1, 0, 'C');
$fpdf -> Cell(45,7,$cliente["fecha_registro"], 1, 0, 'C');
endforeach;
$fpdf -> Ln(10);



$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(200,10,utf8_decode('Todos los derechos reservados'), 1, 0, 'C');

$fpdf -> SetFont("Times", "B", 24);
$fpdf -> Output();



?>