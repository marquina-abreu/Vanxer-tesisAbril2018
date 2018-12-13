<?php

require "config_base.php";
require "functions.php";

$conexion= conexion_noticias($bd_config); // variable de conexion..
$id_transportista=$_GET["id_tr"];

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$titulo= limpiarDatos($_POST["titulo"]);
	$extracto= limpiarDatos($_POST["extracto"]);
	$texto=$_POST["texto"];
	$thumb= $_FILES["thumb"]["tmp_name"];
	$id_transportista=$_POST["id_transporte"];

	$imagen_subida = $blog_config["carpeta_imagenes"] .  $_FILES["thumb"]["name"];

	move_uploaded_file($thumb, $imagen_subida); 

	
    $consulta= $conexion->prepare("INSERT INTO noticias_trans (id_noticia, titulo_trans, extracto_trans, texto_trans, thumb, id_trans_not)VALUES(NULL, :titulo, :extracto, :texto, :thumb,:id_trans)");

    $consulta->execute(array(
	":titulo"=> $titulo,
	":extracto"=> $extracto,
	":texto"=>$texto,
	":thumb"=> $_FILES["thumb"]["name"],
	":id_trans"=>$id_transportista));

	header("location: index_transportista.php");
}
	
require "Views/nueva_noticia_view.php";
?>