<?php 
include ("pdo_conexion.php");
include_once("config_base.php");

error_reporting(E_ERROR | E_PARSE);

$consul_zona= $conexion->prepare("SELECT * FROM zona");
$consul_zona->execute();
$resul_zona=$consul_zona->fetchAll();


$trans_selec=$_POST['vanero'];

$sql=$conexion->prepare("SELECT capacidad FROM transportistas WHERE id_transporte=:id_tra");
$sql->execute(array(":id_tra"=>$trans_selec));
$capacidad=$sql->fetch();
$capacidad=$capacidad["0"];


if (isset($_POST["cod"])) {
$cod=$_POST["cod"];
$consulta_cod= $conexion->prepare("SELECT id_codigo FROM codigo_verif_cli WHERE id_codigo=:cod AND id_trans=:id_t");
$consulta_cod->execute(array(
	":cod"=>$cod,
	":id_t"=>$trans_selec));
$codigo=$consulta_cod->fetch();
if ($codigo!=false) { 


$zona_selec=$_POST['ubicacion'];



$turno_selec=$_POST['turno_sele'];


$con_tur =$conexion->prepare("SELECT COUNT(*) FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:idt AND cliente_turno.turno_cli=:idtur");
$con_tur->execute(array(":idt"=>$trans_selec,":idtur"=>$turno_selec));
$cant_cli=$con_tur->fetch();
$cant_cli=$cant_cli["0"];

                    

$usu_trans=$_POST['usuario_cli'];
$Clave=$_POST['contrasenna_cli'];
$priv=$_POST['priv'];


$vali= $conexion->query("SELECT id_cod_ver FROM clientes WHERE id_cod_ver='$cod'");
$cod_existe=$vali->fetch();

if ($cod_existe!=false) {
	$mensaje="<label class='alert alert-info'>El codigo que Ingreso ya pertenece a un Cliente, gracias.</label>";
}

else {

if ($cant_cli!==$capacidad) {
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




$nombre=$_POST['nombre_cli'];
$apellido=$_POST['apellido_cli'];
$correo=$_POST['correo_cli'];
$telefono=$_POST['telefono_cli'];
$thumb= $_FILES["thumb"]["tmp_name"];
$imagen_subida = $blog_config["carpeta_perfil_cli"] .  $_FILES["thumb"]["name"];
move_uploaded_file($thumb, $imagen_subida);  



$consulta3=$conexion->prepare("INSERT INTO clientes (id_cliente,estado,nombre_cli,apellido_cli,correo,telefono,imagen_cli,id_zona_cli,id_trans_cli,id_usuario_cli,id_cod_ver) VALUES
	(null,1,:nombre,:apellido,:correo,:telefono,:img,:id_zona,:id_trans,:id_usuario,:id_cod)");
$consulta3->execute(array(
	":nombre"=>$nombre,
	":apellido"=>$apellido,
	":correo"=>$correo,
	":telefono"=>$telefono,
	":id_zona"=>$zona_selec,
	":img"=>$_FILES["thumb"]["name"],
	":id_trans"=>$trans_selec,
	":id_usuario"=>$id_usuario,
	":id_cod"=>$cod));

$consulta4= $conexion ->prepare("SELECT id_cliente FROM clientes INNER JOIN usuarios on usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu_cli");
$consulta4->execute(array(
	":usu_cli"=>$usu_trans));
$resul_id= $consulta4->fetch();
$id_cliente=$resul_id["0"];

$insert4= $conexion->prepare("INSERT INTO cliente_turno (cliente,turno_cli) VALUES (:cli,:turn)");
$insert4->execute(array(
	":cli"=>$id_cliente,
	":turn"=>$turno_selec));

$mensaje="<label class='alert alert-success'>Cliente Registrado con Exito</label>";
}
else {
	$mensaje="<label class='alert alert-danger'>EL TURNO SELECCIONADO ESTA FULL, porfavor elija otro turno o contactese con el Transportista</label>";
}
}

}
else {
	$mensaje="<label class='alert alert-danger'>Lo sentimos su codigo es incorrecto.. porfavor contactese con el Transportisa o Administrador</label>";
}
}// fin
require_once("Views/forum_clientes_view.php");

?>