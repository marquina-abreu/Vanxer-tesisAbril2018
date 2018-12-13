<?php

include_once("pdo_conexion.php");


$EmailRecuperar = $_POST['correo_cli'];
$query= $conexion->prepare("SELECT usuarios.clave FROM usuarios INNER JOIN clientes ON usuarios.id_usuario= clientes.id_usuario_cli WHERE clientes.correo=:correo");
$query->execute(array(":correo"=>$EmailRecuperar));
$resul=$query->fetch();




if($resul!==false){
 
$mail = "Su clave es:".$resul["clave"];
//Titulo
$titulo = "Recuperación de clave";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Soporte Vanxer  < vanxer.appvzla@gmail.com >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail($EmailRecuperar,$titulo,$mail,$headers);
if($bool){
    echo "Mensaje enviado con exito";
}else{
    echo "Mensaje no enviado";
}
}else{
	echo "<script>alert('ERROR: ¡ CORREO NO ASOCIADO A NINGUNA CUENTA !');
				  window.location='index.php';
		  </script>";
}


?>