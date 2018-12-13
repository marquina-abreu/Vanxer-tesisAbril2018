<?php 
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["idsoli"])&&$_POST["codi"]) {

$codigo=$_POST["codi"];
$idsoli=$_POST["idsoli"];
$id_trans=$_POST["trans"];



$sql=$conexion->query("SELECT id_codigo FROM codigo_verif_cli WHERE id_codigo='$codigo'");
$chequeo= $sql->fetch();

if ($chequeo!==false) {
	echo "<label class='alert alert-danger'>Codigo ya Registrado, intente con otro.</label>";
} 
else{
$bus=$conexion->query("SELECT * FROM solicitudes WHERE id_solicitud=$idsoli");
$busres=$bus->fetch();

$regis= $conexion->prepare("INSERT INTO codigo_verif_cli (id_codigo,nombre,apellido,id_trans) VALUES (:id_cogido, :nombre, :apellido, :id_trans)");

$regis->execute(array(
	":id_cogido"=>$codigo,
	":nombre"=>$busres["nombre_cl"],
	":apellido"=>$busres["apellido_cl"],
	":id_trans"=>$id_trans));

//enviar codigo
$mail = "Su codigo de verificación es: "."<b>".$codigo."</b>";
//Titulo
$titulo = "Solicitud de Transportista";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Vanxer App  < vanxer.appvzla@gmail.com >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail($busres["correo_soli"],$titulo,$mail,$headers);


$eli=$conexion->prepare("DELETE FROM solicitudes WHERE nombre_cl =:no AND apellido_cl=:ap AND id_trans_soli=:idt");

$eli->execute(array(
	":no"=>$busres["nombre_cl"],
	":ap"=>$busres["apellido_cl"],
	":idt"=>$id_trans
));

echo"<script>
alert('Codigo enviado Exitosamente');
window.location='solictud_clientes.php';</script>";
}
} 
else {
	echo "<label class='alert alert-danger'>Rellene los campos porfavor.</label>";
}







?>