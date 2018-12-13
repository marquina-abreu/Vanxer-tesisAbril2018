<?php

require "config_base.php";
require "functions.php";

$conexion= conexion_noticias($bd_config);// conexion a Basededatos..
error_reporting(E_ERROR | E_PARSE);


$ubic=$_POST['ubicacion'];
$consulta1= $conexion->prepare("SELECT * FROM zona");

$consulta1->execute();
$resultado_ubi=$consulta1->fetchAll();




if (isset($_POST["cod"])) {
$cod=$_POST["cod"];
$consulta_cod= $conexion->prepare("SELECT codigo FROM verifi_trans WHERE codigo=:cod");
$consulta_cod->execute(array(
	":cod"=>$cod));
$codigo=$consulta_cod->fetch();


if ($codigo!=false) { 
	

$usu_trans=$_POST['usuario_trans'];
$Clave=$_POST['contrasenna_trans'];
$priv=$_POST['priv'];
$thumb= $_FILES["thumb"]["tmp_name"];
$imagen_subida = $blog_config["carpeta_perfil_trans"] .  $_FILES["thumb"]["name"];
move_uploaded_file($thumb, $imagen_subida);  

$consulta2= $conexion->prepare("INSERT INTO usuarios (id_usuario,usuario,clave,privilegio) VALUES (null,:usuario,:clave,:privilegio)");
$consulta2->execute(array(
	":usuario"=>$usu_trans,
	":clave"=>$Clave,
	":privilegio"=>$priv));


$consulta2_1= $conexion->prepare("SELECT id_usuario FROM usuarios WHERE usuario= :usu");
$consulta2_1->execute(array(
	":usu"=>$usu_trans));

$resultado_id=$consulta2_1->fetch();

if($row = $resultado_id){
	$id_usuario = $row["0"];
}


$nombre=$_POST['nombre_trans'];
$apellido=$_POST['apellido_trans'];
$correo=$_POST['correo_trans'];
$telefono=$_POST['telefono_trans'];


$clientid=$_POST["clientid"];
$clientsecret= $_POST["clientsecret"];


$placa=$_POST['placa_trans'];
$modelo=$_POST['modelo_trans'];
$anno=$_POST['anno_trans'];
$capacidad=$_POST['cap_trans'];
$thumb2= $_FILES["thumb2"]["tmp_name"];
$imagen_subida2 = $blog_config["carpeta_van"] .  $_FILES["thumb2"]["name"];

move_uploaded_file($thumb2, $imagen_subida2);  

$consulta3=$conexion->prepare("INSERT INTO transportistas (id_transporte,nombre_trans,apellido_trans,correo_trans,telefono_trans,placa,modelo,anno,capacidad,foto_trans,foto_van,client_id,client_secret,id_zona_trans,id_usuario_trans) VALUES
	(null,:nombre,:apellido,:correo,:telefono,:placa,:modelo,:anno,:capacidad,:foto_per,:foto_van,:clid,:clse,:id_zona,:id_usuario)");

$consulta3->execute(array(
	":nombre"=>$nombre,
	":apellido"=>$apellido,
	":correo"=>$correo,
	":telefono"=>$telefono,
	":placa"=>$placa,
	":modelo"=>$modelo,
	":anno"=>$anno,
	":capacidad"=>$capacidad,
	":foto_per"=> $_FILES["thumb"]["name"],
	":foto_van"=> $_FILES["thumb2"]["name"],
	":clid"=>$clientid,
	":clse"=>$clientsecret,
	":id_zona"=>$ubic,
	":id_usuario"=>$id_usuario));
if ($consulta3!==false) {
	$mensaje="Registrado con Exito";
	header("location:Mantenimiento/?dsd=".$id_usuario);

}
}

else {
	$mensaje="Lo sentimos su codigo es incorrecto.. porfavor contactese con el Administrador";
}
}// fin del isset



require_once("Views/registro_transporte_view.php");
?>