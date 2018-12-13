<?php 

include_once("pdo_conexion.php");
function fecha($fecha) { 
	$timestamp= strtotime($fecha); 
	$meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

	$dia= date("d",$timestamp); 
	$mes= date("m",$timestamp) - 1; 
	$year= date("Y",$timestamp);
	$hora=date("H:i:s",$timestamp);

	$fecha = "$dia de ". $meses[$mes] ." del $year";
	return $fecha;
}

if (isset($_POST["asunto"])&&$_POST["comentario"]) {

$usuario=$_POST["usua"];
$asunto=$_POST["asunto"];
$comentario=$_POST["comentario"];
$id_noti=$_POST["id_noti"];

$sql=$conexion->prepare("INSERT INTO comentarios (id_coment,usuario_coment,asunto,comentario,id_noticia_coment) VALUES (null,:usu,:asunto,:coment,:id_no)");
$sql->execute(array(
	":usu"=>$usuario,
	":asunto"=>$asunto,
	":coment"=>$comentario,
	":id_no"=>$id_noti));

$cons=$conexion->prepare("SELECT * FROM comentarios WHERE id_noticia_coment=:id");
$cons->execute(array
	(":id"=>$id_noti));

$resul=$cons->fetchAll();

foreach ($resul as  $comentario):

  
         $sqltrans=$conexion->prepare("SELECT foto_trans FROM transportistas INNER JOIN usuarios ON usuarios.id_usuario=transportistas.id_usuario_trans WHERE usuarios.usuario=:usua");
         $sqltrans->execute(array(":usua"=>$comentario["usuario_coment"]));
         $foto_trans=$sqltrans->fetch();
         $foto_trans=$foto_trans['foto_trans'];

  
  $sql_img=$conexion->prepare("SELECT imagen_cli FROM clientes INNER JOIN usuarios ON usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu");
         $sql_img->execute(array(":usu"=>$comentario["usuario_coment"]));
         $res=$sql_img->fetch();
         $res=$res['imagen_cli'];

       echo"<div class='comments-container'>";
       echo"<ul style='list-style:none;' id='comments-list' class='comments-list'>";
       echo"<li>";
       echo"<div class='comment-main-level'>";
          
       if($res!=false){
       echo"<div class='comment-avatar'><img src='Clientes/foto_perfil/".$res."'></div>";
        }else{
          echo"<div class='comment-avatar'><img src='perfil_trans/foto_vanero/".$foto_trans."'></div>";
        }
        
       echo"<div class='comment-box'>";
       echo"<div class='comment-head'>";
       echo"<h6 class='comment-name by-author'>".$comentario['usuario_coment']."</h6>";
       echo"<span>".fecha($comentario['fecha_coment'])."</span>";
       echo "<a href='' class='btn btn-default pull-right'><span  class='glyphicon glyphicon-trash'></span></a>";
       echo"</div>";
         echo"<div class='comment-content'>";
           echo"<b>Asunto:</b><p style='display:inline-block;'>".$comentario["asunto"]."</p>";
           echo"<p class='comen'>".$comentario["comentario"]."</p>";
         echo"</div>";
         echo"</div>";
         echo"</div>";
         echo"</li>";
         echo"</ul>";
         echo"</div>";
endforeach;
}
else/*Else isset*/
{
	echo "<div class='container'><p class='text-danger'>PORFAVOR RELLENE LOS CAMPOS<span class='glyphicon glyphicon-exclamation-sign'></span></p></div>";
}





?>