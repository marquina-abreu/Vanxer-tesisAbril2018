<?php
require "config_base.php";
require "functions.php";

$conexion= conexion_noticias($bd_config); 

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$titulo= limpiarDatos($_POST["titulo"]);
	$extracto= limpiarDatos($_POST["extracto"]);
	$texto=$_POST["texto"];
	$id= limpiarDatos($_POST["id"]);
	$thumb_guardada= $_POST["thumb-guardada"];

	$thumb= $_FILES["thumb"];

	
	if (empty($thumb["name"])) {
		$thumb=$thumb_guardada; 		
	}
	else {
		$imagen_subida = $blog_config["carpeta_imagenes"] .  $_FILES["thumb"]["name"]; 
		move_uploaded_file($_FILES["thumb"]["tmp_name"], $imagen_subida);  
		
		$thumb= $_FILES["thumb"]["name"]; 
	}

	$consulta= $conexion-> prepare("UPDATE noticias_trans SET titulo_trans= :titulo, extracto_trans= :extracto, texto_trans= :texto, thumb= :thumb WHERE id_noticia= :id");

	$consulta->execute(array(
		 ":titulo" =>$titulo,
		 ":extracto"=>$extracto,
		 ":texto"=>$texto,
		 ":thumb"=>$thumb,
		 ":id"=>$id ));

	header("location: index_transportista.php");

}
else { 
	$id_noticia = id_noticia($_GET["id"]);

	if (empty($id_noticia)) {
		header("location: index_transportista.php");
	}

	$noticia=obtener_noticia_por_id($conexion, $id_noticia);
	if (!$noticia) {
		header("location: index_transportista.php");
	}

	$noticia=$noticia[0];
}

require "Views/editar_noticia_view.php";
?>