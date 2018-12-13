<?php 
include "config_base.php";
include "functions.php";

$conexion= conexion_noticias($bd_config);
$id_noticia= id_noticia($_GET['id']);

if (!$conexion) {
	header("location:error.php");
}

if (empty($id_noticia)) {
	header("location:index_cliente.php"); 
}

$noticia=obtener_noticia_por_id($conexion,$id_noticia);

$comentarios=obtener_comentarios($conexion,$id_noticia);

if (!$noticia) {
	header("location:index.php");		
}

$noticia= $noticia[0];
require "Views/noticia_abierta_view.php";
?>