<?php 
include "config_base.php";
include "functions.php";

$conexion= conexion_noticias($bd_config);
if (!$conexion) {
	header("location:error.php");
	# code...
}
try{

	$conexionn= new PDO("mysql:host=localhost;dbname=db_transporte","root","");
	//echo "Conexion Establecida";


} catch(PDOException $e){
	echo "Error:". $e->getMessage();
	die(); // matar ejecucion de la pagina
}


require "Views/index_cliente_view.php";

?>