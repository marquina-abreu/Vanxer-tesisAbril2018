<?php
include '../../../pdo_conexion.php';
require_once '../../FPDF/fpdf.php';

 $json_p= $_POST["json_pagos"];
 $acomulado= $_POST["aco"];
 $acomulado=json_decode($acomulado);

$lista= json_decode($json_p,true);



$fpdf = new FPDF();
$fpdf -> AddPage("P","Letter",0);
$fpdf -> Image('../../Logo_vanxer2.png',10,7,60);
$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(200,10,utf8_decode('Lista de pagos realizados'), 1, 0, 'C');
$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Ln(10);
$fpdf -> Cell(25,7,'Nombre', 1, 0, 'C');
$fpdf -> Cell(25,7,utf8_decode('Apellido'), 1, 0, 'C');
$fpdf -> Cell(20,7,'Turno', 1, 0, 'C');
$fpdf -> Cell(35,7,'N referencia', 1, 0, 'C');
$fpdf -> Cell(45,7,'Monto', 1, 0, 'C');
$fpdf -> Cell(45,7,'Fecha', 1, 0, 'C');
$fpdf -> SetFont("Arial", "I", 12);
 foreach ($lista as $pago):
	$fpdf -> Ln(7);
$fpdf -> Cell(25,7,$pago["nombre_cli"], 1, 0, 'C');
$fpdf -> Cell(25,7,$pago["apellido_cli"], 1, 0, 'C');
$fpdf -> Cell(20,7,$pago["turno_pa"], 1, 0, 'C');
$fpdf -> Cell(35,7,$pago["nreferencia"], 1, 0, 'C');
$fpdf -> Cell(45,7,$pago["monto"]. " BsF", 1, 0, 'C');
$fpdf -> Cell(45,7,$pago["fecha"], 1, 0, 'C');
endforeach;
$fpdf -> Ln(10);
$fpdf -> Ln(20);
$fpdf -> Cell(70,7,'Total de ingresos: '.number_format($acomulado,'2','.',',').' BsF', 0, 0, 'C');



$fpdf -> Ln(20);
$fpdf -> SetFont("Arial", "B", 12);
$fpdf -> Cell(200,10,utf8_decode('Todos los derechos reservados'), 1, 0, 'C');


$fpdf -> Output();





?>