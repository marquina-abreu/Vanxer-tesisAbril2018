<?php
sleep(1);
include('pdo_conexion.php');


if($_REQUEST)
{
	$username 	= $_REQUEST['username'];
	$username_conteo= strlen($username); 
	if (!empty($username) and $username_conteo>=4) { 
	
	$query = $conexion->query("SELECT usuario FROM usuarios WHERE usuario ='$username'");
	$results = $query->fetch();

	
	if($results!==false) 
	{
		echo '<label class="text-danger">Usuario Existente <span class="glyphicon glyphicon-remove"></span></label>';
	}
	else
	{
		echo '<label class="text-success">Usuario Disponible <span class="glyphicon glyphicon-ok"></span></label>';
	}
}
}
?>