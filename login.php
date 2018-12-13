<?php 


if (isset($_POST["email"])&&$_POST["contrasenna"]) {
	# code...


include ("pdo_conexion.php"); 


$Correo=$_POST['email'];
$Clave=$_POST['contrasenna'];




$Consulta_pri =$conexion->prepare("SELECT privilegio FROM usuarios  WHERE usuarios.usuario =:email");

$Consulta_pri ->execute(array(
	":email"=> $Correo));

$resul_pri=$Consulta_pri->fetch();

if($row = $resul_pri){
	$Tipo_usuario = $row["0"];
}


$consulta=$conexion->prepare("SELECT * FROM usuarios  WHERE usuarios.usuario=:email AND usuarios.clave=:contrasenna");

$consulta->execute(array(
	":email"=> $Correo,
	":contrasenna"=> $Clave ));

$resultado=$consulta->fetch();


if ($resultado!==false) {
	
	if($Tipo_usuario==1){
		
		session_start();
	    $_SESSION["admin"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO ADMIN <span class='glyphicon glyphicon-ok-sign'></span></p></div>";

		echo"<script>window.location='admin/';</script>"; 
	}elseif ($Tipo_usuario==2) {
		
		session_start();
	    $_SESSION["transportista"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO TRANSPORTISTA <span class='glyphicon glyphicon-ok-sign'></span></p></div>";

		echo"<script>window.location='index_transportista.php';</script>";
	}
	elseif ($Tipo_usuario==3) {
		
		session_start();
	    $_SESSION["cliente"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO CLIENTE <span class='glyphicon glyphicon-ok-sign'></span></p></div>";
		echo"<script>window.location='Clientes/';</script>";
	}
	
}else{
	echo "<div class='container'><p class='text-danger'>USUARIO O CONTRASEÑA INVALIDOS <span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}   
}
else/*Else isset*/
{
	echo "<div class='container'><p class='text-danger'>PORFAVOR RELLENE LOS CAMPOS<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}

?>
