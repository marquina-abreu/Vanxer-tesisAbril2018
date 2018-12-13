<?php 
include ("pdo_conexion.php"); 
error_reporting(E_ERROR | E_PARSE); 

// ESTO ES PARA LO DE LAS NOTICIAS!
require "config_base.php";
require "functions.php";

try{

	$conexion_clientes= new PDO("mysql:host=localhost;dbname=db_transporte","root","");
	//echo "Conexion Establecida";


} catch(PDOException $e){
	echo "Error:". $e->getMessage();
	die(); // matar ejecucion de la pagina
}

$conexion= conexion_noticias($bd_config);

if (!$conexion) {
	header("location:error.php");
	# code...
}


require_once("Views/index_transportista_view.php");
?>