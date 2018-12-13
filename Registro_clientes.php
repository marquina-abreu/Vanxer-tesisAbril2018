<?php 
include ("pdo_conexion.php"); // conexion a Basededatos..


	$Usuario=$_POST['usuario'];
	$Nombre=$_POST['nombre'];
	$Apellido=$_POST['apellido'];
	$Correo=$_POST['correo'];
	$Clave=$_POST['clave'];
	$Clave2=$_POST['clave2'];
	$Telefono=$_POST['Telefono'];
	$Turno=$_POST['turno'];
	


$errores=""; 


$Chequeo= $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario OR correo=:correo LIMIT 1"); 
$Chequeo->execute(array(":usuario"=>$Usuario, ":correo"=>$Correo)); 
$resultado=$Chequeo->fetch(); 
if ($resultado!=false) {
	$errores.="El nombre de Usuario ya Existe!";
	echo "<script>
	alert('ERROR: CLIENTE YA REGISTRADO');
    window.location='index.php';
			   </script>";
}

// insertar
if ($errores=="") {
	$Chequeo=$conexion->prepare("INSERT INTO usuarios (id_usuario,usuario,nombre,apellido,correo,contrasenna,telefono,turno,Privilegio) VALUES (null,:usuario,:nombre,:apellido,:correo,:contrasenna,:Telefono,:turno,1)");
	$Chequeo->execute(array(
		":usuario"=>$Usuario,
		":nombre"=>$Nombre,
		":apellido"=>$Apellido,
		":correo"=>$Correo,
		":contrasenna"=>$Clave,
		":Telefono"=>$Telefono,
		":turno"=>$Turno));

	header("location:index.php");

	
}

?>