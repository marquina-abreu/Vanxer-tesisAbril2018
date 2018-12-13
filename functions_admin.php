<?php
function conexion_noticias($bd_config) {
try{

	$conexion= new PDO("mysql:host=localhost;dbname=".$bd_config["basedatos"],$bd_config["usuario"],$bd_config["pass"]);
	
	return $conexion;


} catch(PDOException $e){
	return false;
}
}

function limpiarDatos_adm($datos) {
	$datos=trim($datos);
	$datos=stripslashes($datos);
	$datos=htmlspecialchars($datos);
	return $datos;
}

function pagina_actual_adm(){
	return isset($_GET["p"]) ? (int)$_GET["p"] :1;
}
function obtener_noticias_adm($post_por_pagina, $conexion){
	$inicio= ( pagina_actual_adm() >1) ? pagina_actual_adm()* $post_por_pagina - $post_por_pagina:0;
	$sentencia= $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM noticias_trans LIMIT $inicio , $post_por_pagina"); 
	$sentencia->execute();
	return $sentencia->fetchAll();

}

function numero_paginas_adm($post_por_pagina, $conexion){
	$total_noticia=$conexion->prepare("SELECT FOUND_ROWS() AS total");
	$total_noticia->execute();
	$total_noticia=$total_noticia->fetch()["total"];

	$numero_paginas= ceil($total_noticia/$post_por_pagina);
	return $numero_paginas;

}

function id_noticia_adm($id) {
	return(int)limpiarDatos_adm($id);
}

function obtener_noticia_por_id_adm($conexion,$id){
	$resultado=$conexion->query("SELECT * FROM noticias_trans WHERE id_noticia=$id LIMIT 1");
	$resultado=$resultado->fetchAll();
	return($resultado) ? $resultado : false; 
}

function fecha_adm($fecha) { 
	$timestamp= strtotime($fecha); 
	$meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

	$dia= date("d",$timestamp); 
	$mes= date("m",$timestamp) - 1; 
	$year= date("Y",$timestamp);

	$fecha = "$dia de ". $meses[$mes] ." del $year";
	return $fecha;
}
?>