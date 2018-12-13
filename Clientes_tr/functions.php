<?php
function conexion_noticias($bd_config) {
try{

	$conexion= new PDO("mysql:host=localhost;dbname=".$bd_config["basedatos"],$bd_config["usuario"],$bd_config["pass"]);
	//echo "Conexion Establecida";
	return $conexion;


} catch(PDOException $e){
	return false;
}
}

function limpiarDatos($datos) {
	$datos=trim($datos);
	$datos=stripslashes($datos);
	$datos=htmlspecialchars($datos);
	return $datos;
}

function pagina_actual_trans(){
	return isset($_GET["p"]) ? (int)$_GET["p"] :1;
}

function obtener_clientes_trans($post_por_pagina, $id_transportista, $conexion){ 
	$inicio= ( pagina_actual_trans() >1) ? pagina_actual_trans()* $post_por_pagina - $post_por_pagina:0;
	$sentencia= $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM clientes INNER JOIN transportistas on transportistas.id_transporte=clientes.id_trans_cli WHERE clientes.id_trans_cli=$id_transportista LIMIT $inicio , $post_por_pagina"); 
	$sentencia->execute();
	return $sentencia->fetchAll();

}
// paginacion
function numero_paginas_trans($post_por_pagina, $conexion){
	$total_clientes=$conexion->prepare("SELECT FOUND_ROWS() AS total");
	$total_clientes->execute();
	$total_clientes=$total_clientes->fetch()["total"];

	$numero_paginas= ceil($total_clientes/$post_por_pagina);
	return $numero_paginas;

}

function id_noticia($id) {
	return(int)limpiarDatos($id);
}

function obtener_noticia_por_id($conexion,$id){
	$resultado=$conexion->query("SELECT * FROM noticias_trans WHERE id_noticia=$id LIMIT 1");
	$resultado=$resultado->fetchAll();
	return($resultado) ? $resultado : false; 
}

function fecha($fecha) { 
	$timestamp= strtotime($fecha); 
	$meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

	$dia= date("d",$timestamp); 
	$mes= date("m",$timestamp) - 1; 
	$year= date("Y",$timestamp);

	$fecha = "$dia de ". $meses[$mes] ." del $year";
	return $fecha;
}
?>