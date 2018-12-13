<?php 
include_once("../pdo_conexion.php");
include_once("config_base.php");


$nombre_new=$_POST["nombre_new"];
$apellido_new=$_POST["apellido_new"];
$telefono_new=$_POST["telefono_new"];
$clave_new=$_POST["clave_new"];
$id_c=$_POST["id_cli"];
$thumb_guardada= $_POST["thumb-guardada"];
$thumb= $_FILES["thumb"];

	
if (empty($thumb["name"])) {
	$thumb=$thumb_guardada; 		
}
else {
	$imagen_subida = $blog_config["carpeta_perfil_cli"] .  $_FILES["thumb"]["name"]; 
	move_uploaded_file($_FILES["thumb"]["tmp_name"], $imagen_subida);  
	
	$thumb= $_FILES["thumb"]["name"]; 
	unlink($blog_config["carpeta_perfil_cli"].$thumb_guardada);
}


$upda= $conexion->prepare("UPDATE clientes SET nombre_cli =:nombre, apellido_cli=:apelli, telefono=:tel, imagen_cli=:thumb WHERE id_cliente=:id_c");

$upda->execute(array(
	":nombre"=>$nombre_new,
	":apelli"=>$apellido_new,
	":tel"=>$telefono_new,
	":thumb"=>$thumb,
	":id_c"=>$id_c));



header("location:cliente_editar_perfil.php");





 ?>