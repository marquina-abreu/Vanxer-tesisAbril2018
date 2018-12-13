<?php 


include_once("pdo_conexion.php");
include_once("config_base.php");

$nombre_new=$_POST["nombre_new"];
$apellido_new=$_POST["apellido_new"];
$telefono_new=$_POST["telefono_new"];
$id_trans=$_POST["id_trans"];
$cap=$_POST["capacidad_new"];
$thumb_guardada= $_POST["thumb-guardada"];
$thumb= $_FILES["thumb"];


if (empty($thumb["name"])) {
	$thumb=$thumb_guardada;
	
}
else {
	$imagen_subida = $blog_config["carpeta_perfil_trans"] .  $_FILES["thumb"]["name"]; 
	move_uploaded_file($_FILES["thumb"]["tmp_name"], $imagen_subida);  
	
	$thumb= $_FILES["thumb"]["name"]; // la nueva thumb.
	unlink($blog_config["carpeta_perfil_trans"].$thumb_guardada);// borro la vieja
}

$upda= $conexion->prepare("UPDATE transportistas SET nombre_trans =:nombre, apellido_trans=:apelli, telefono_trans=:tel, foto_trans=:thumb, capacidad=:cap WHERE id_transporte=:id_trans");

$upda->execute(array(
	":nombre"=>$nombre_new,
	":apelli"=>$apellido_new,
	":tel"=>$telefono_new,
	":id_trans"=>$id_trans,
	":thumb"=>$thumb,
	":cap"=>$cap));

	





header("location:perfil_transportista.php");





 ?>