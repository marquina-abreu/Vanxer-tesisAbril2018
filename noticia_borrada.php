<?php
include ("pdo_conexion.php");

error_reporting(E_ERROR | E_PARSE);

$id_noti=$_GET["nb"];



$cons=$conexion->prepare("DELETE FROM noticias_trans WHERE id_noticia =:id");

$cons->execute(array(":id"=>$id_noti));

$cons2=$conexion->query("DELETE FROM comentarios WHERE id_noticia_coment =$id_noti");



header("location:index_transportista.php");






?>