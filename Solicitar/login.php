<?php 

//Chequear que haya seteado (rellenado)campos de correo y clave
if (isset($_POST["email"])&&$_POST["contrasenna"]) {
	# code...


include ("../pdo_conexion.php"); // conexion a Basededatos..


$Correo=$_POST['email'];
$Clave=$_POST['contrasenna'];
//para admin

/***************************|
        A D M I N            
*****************************/
//Comprobar si es admin o cliente..

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
		//Session de Admin
		session_start();
	    $_SESSION["admin"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO ADMIN <span class='glyphicon glyphicon-ok-sign'></span></p></div>";

		echo"<script>window.location='../admin/';</script>"; /*con Header Location no me sirvio porque me manda a la pagina dentro del
	mismo modal, en cambio con Js redirijo bien */    
	}elseif ($Tipo_usuario==2) {
		//Session de cliente
		session_start();
	    $_SESSION["transportista"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO TRANSPORTISTA <span class='glyphicon glyphicon-ok-sign'></span></p></div>";

		echo"<script>window.location='../index_transportista.php';</script>";
	}
	elseif ($Tipo_usuario==3) {
		//Session de cliente
		session_start();
	    $_SESSION["cliente"]=$Correo;
		echo "<div class='container'><p class='text-success'>BIENVENIDO CLIENTE <span class='glyphicon glyphicon-ok-sign'></span></p></div>";
		echo"<script>window.location='../Clientes/';</script>";
	}
	
}else{
	echo "<div class='container'><p class='text-danger'>USUARIO O CONTRASEÑA INVALIDOS <span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}   
}//FIN DEL IF DEL ISSET
else/*Else isset*/
{
	echo "<div class='container'><p class='text-danger'>PORFAVOR RELLENE LOS CAMPOS<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}

?>
