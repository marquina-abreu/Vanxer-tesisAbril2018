<?php 
include ("pdo_conexion.php");

/*=======================================
      traer el nombre, apellido y comentario por el cliente                      
=======================================*/
$nombre_cli=$_POST["nombre_visi"];
$apellido_cli=$_POST["apellido_visi"];
$correo=$_POST["correo"];
$coment_cli=$_POST["coment_visi"];
$telefono_cli=$_POST["telefono_visi"];
$vanero=$_POST["vanero_"];

if (empty($nombre_cli)||empty($apellido_cli)||empty($correo)||empty($coment_cli)||empty($telefono_cli)||empty($vanero)) {
	
}else{

$consul_soli= $conexion->prepare("INSERT INTO solicitudes (id_solicitud,nombre_cl,apellido_cl,correo_soli,telefono,coment,id_trans_soli) VALUES (null,:nombre,:apellido,:correo,:telefono,:comentario,:transportista)");
$consul_soli->execute(array(
	":nombre"=>$nombre_cli,
	":apellido"=>$apellido_cli,
	":telefono"=>$telefono_cli,
	":comentario"=>$coment_cli,
	":correo"=>$correo,
	":transportista"=>$vanero));


echo "<script>
alert('Solicitud enviada Exitosamente');
window.location='solicitud_trans.php';</script>";

}



?>