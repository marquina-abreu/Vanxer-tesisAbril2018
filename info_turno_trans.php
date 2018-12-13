<?php
include_once("pdo_conexion.php");

$idturno=$_GET["id_tur"];
$idtrans=$_GET["idtrans"];

$sql=$conexion->query("SELECT * FROM turnos INNER JOIN trans_turno ON turnos.id_turno=trans_turno.turno WHERE trans_turno.transportista=$idtrans AND trans_turno.turno=$idturno");
$result=$sql->fetch();



echo "<div role='tabpanel' class='tab-pane active' id='photo'>";
echo "<br>";
echo "<div class='form-group'>";
	echo "<label>Turno:</label>";
	echo "<p>".$result["nombre_tur"].".</p>";
echo "</div>";
echo "<div class='form-group'>";
	echo "<label>Mensualidad:</label>";
	echo "<p>".number_format($result["costo"],2,',','.')." BsF.</p>";
echo "</div>";
echo "<div class='form-group'>";
	echo "<label>Dia de Pago:</label>";
	echo "<p>Los primeros ".$result["dia_pago"]." dias del mes.</p>";
echo "</div>";
echo "</div>";

echo "<div role='tabpanel' class='tab-pane' id='productInfo'>";
echo "<br>";
echo "<form action='/transporte/Actualizar_turno/' method='POST'>";
echo "<div class='form-group'>";
	echo "<label>Mensualidad:</label>";
	echo "<input type='number' name='mensu' class='form-control' placeholder='Mensualidad' value='".$result["costo"]."'>";
echo "</div>";
echo "<div class='form-group'>";
	echo "<label>Dia de Pago:</label>";
	echo "<input type='text' name='dpagoo' id='dpagoo' class='form-control' placeholder='Dia de pago' value='".$result["dia_pago"]."'>";
	echo "<input type='hidden' value='".$idturno."' name='idturno'>";
	echo "<input type='hidden' value='".$idtrans."' name='idtrans'>";
echo "</div>";
echo "<input type='submit' value='Actualizar' class='btn btn-primary btn-block'/>";
echo "</form>";
echo "</div>";




?>