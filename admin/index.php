<?php 
include "config_base.php";
include "functions.php";

$conexion= conexion_noticias($bd_config);
if (!$conexion) {
	header("location:error.php");
	# code...
}


require("views/index_admin_view.php");
?>