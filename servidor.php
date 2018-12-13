<?php 
 require "pdo_conexion.php";

	error_reporting(E_ERROR | E_PARSE); 

 $clientes = $_GET["clientes"]; 
 $usuarioIDActualizado = $_GET['usuarioIDActualizado']; 
 $nombreActualizado = $_GET['nombreActualizado'];
 
 $usuario_ID = "usuario_ID";
 $nombre_ID = "nombre_ID";
 $apellido_ID = "apellido_ID";
 $correo_ID = "correo_ID";
 $actualizar = "actualizar";
 $borrar = "borrar";

 if ($clientes=== "clientes") {

 	$consulta = $conexion->prepare("SELECT * FROM usuarios");
    
    $consulta -> execute(); 
 	
 	
 	
 	$table="";
 	
 	$resultado = $consulta->fetchAll();
    foreach ($resultado as $usuario): 
    $table .="<tr>";
 	$table .="<td id='".$usuario_ID.$usuario['id_usuario']."'>". $usuario['usuario'] . "</td>";
 	$table .="<td id= '".$nombre_ID.$usuario['id_usuario']."'>". $usuario['nombre'] . "</td>";
 	$table .="<td id= '".$apellido_ID.$usuario['id_usuario']."'>". $usuario['apellido'] . "</td>";
 	$table .="<td id= '".$correo_ID.$usuario['id_usuario']."'>". $usuario['correo'] . "</td>";
 	$table .="<td><input id='".$usuario['id_usuario']."' type = 'button' onclick='editarClientes(this.id)' value= 'Editar' class = 'btn btn-default'></td>";
 	$table .="<td><input id='".$borrar.$usuario['id_usuario']."'type = 'button' value= 'Borrar' class = 'btn btn-danger'></td>";
 	$table .="<td><input id='".$actualizar.$usuario['id_usuario']."'type = 'button' onclick='actualizarCliente(".$usuario['id_usuario'].")' value= 'Actualizar' class = 'btn btn-primary' style= 'display: none;'></td>";
 	$table .= "</tr>";
    endforeach; 
    
    echo $table;
 }
 
 if (!empty($nombreActualizado)) {
 	$cliente = $conexion->quote($nombreActualizado);
 	$consulta = $conexion->prepare("UPDATE usuarios SET nombre =:clientee WHERE id_usuario =:usuarioid");

 	$consulta-> execute(array(
 		":clientee"=>$cliente,
 		":usuarioid"=>$usuarioIDActualizado));
 	
 }

 ?>