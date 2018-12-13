<?php

try{

	$conexion= new PDO("mysql:host=localhost;dbname=db_transporte","root","");
	//echo "Conexion Establecida";


} catch(PDOException $e){
	echo "Error:". $e->getMessage();
	die(); // matar ejecucion de la pagina
}
?>