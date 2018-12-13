<?php
include_once("../pdo_conexion.php");

$id=json_decode($_POST["trans"]);
$codigo=$_POST["codi"];


$sql=$conexion->query("SELECT nombre_tr, apellido_tr FROM solicitud_trans WHERE id_solicitud_trans=$id");
$res=$sql->fetch();
$nombre=$res['nombre_tr'];
$apellido=$res['apellido_tr'];

//chequear

$sql_che=$conexion->query("SELECT codigo FROM verifi_trans WHERE codigo ='$codigo' LIMIT 1");
$chequeo=$sql_che->fetch();
if ($chequeo!==false) {
	echo "Ya ese codigo existe";
}else{

$sql2=$conexion->query("INSERT INTO verifi_trans (id_verifi,codigo,nombre_verf,apellido_verf) VALUES (null,'$codigo','$nombre','$apellido')");

if ($sql2!==false) {
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
$bool = mail('marquinaabreu@gmail.com',$titulo,$mail,$headers);
	echo "Registrado exitosamente";
}else{
	echo "No se pudo registrar";
}

}
?>