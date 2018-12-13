<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Style/style1.css">
    <link rel="stylesheet" type="text/css" href="../Style/Style_paginacion.css">
    <link rel="stylesheet"  href="../fonts.css">
    <script src="../jq/jquery-3.2.1.min.js"></script>
    <script src="../js/JqueryValidate.js"></script>
    <script src="Ajax/comentar_noticias.js"></script>
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php
  include "Header_cliente.php";
?>
<br/><br><br>
<div class="container">
    	<div class="row">
      <div class="col-lg-7">
    			<h2><?php echo $noticia["titulo_trans"]; ?></h2>
    			<p><?php echo fecha($noticia["fecha_trans"]); ?></p>
    			<div class="thumb">
    					<img src="../imagenes/<?php echo $noticia["thumb"]; ?>" class="thumbnail img-responsive">
    			</div>
      </div>
          <br>
      <div class="col-lg-8">
    			<p ><?php echo $noticia["texto_trans"]; ?></p>
      </div>
      </div>
    	

    </div>

<div class="container">
      <div class="row">
       <div class="col-lg-8">
         <h3 class=""><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Comentarios:</h3>
         <br>
         <div id="mostrar_comentarios">
         <?php 
         if (!empty($comentarios)): 
         foreach ($comentarios as  $comentario): ?> 

         <?php
         
         $sqltrans=$conexion->prepare("SELECT foto_trans FROM transportistas INNER JOIN usuarios ON usuarios.id_usuario=transportistas.id_usuario_trans WHERE usuarios.usuario=:usua");
         $sqltrans->execute(array(":usua"=>$comentario["usuario_coment"]));
         $foto_trans=$sqltrans->fetch();
         $foto_trans=$foto_trans['foto_trans'];
         
         
         $sql_img=$conexion->prepare("SELECT imagen_cli FROM clientes INNER JOIN usuarios ON usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu");
         $sql_img->execute(array(":usu"=>$comentario["usuario_coment"]));
         $res=$sql_img->fetch();
         $res=$res['imagen_cli'];
          ?>
          <div class="comments-container">
          <ul style="list-style:none;" id="comments-list" class="comments-list">
          <li>
          <div class="comment-main-level">
          <!--Usuario imagen-->
          <?php if($res!=false){ ?>
          <div class="comment-avatar"><img src="foto_perfil/<?php echo $res; ?>"></div>
          <?php }else{?>
          <div class="comment-avatar"><img src="../perfil_trans/foto_vanero/<?php echo $foto_trans; ?>"></div>
          <?php };?>
          <!--Contenedor del comentario-->
          <div class="comment-box">
          <div class="comment-head">
         <h6 class="comment-name by-author"><?php echo $comentario["usuario_coment"]; ?></h6>
         <span><?php echo fecha($comentario["fecha_coment"]);?></span>
         </div>
         <div class="comment-content">
           <b>Asunto: </b><p style="display:inline-block;"><?php echo $comentario["asunto"]; ?></p>
          <hr class="section-heading-spacer">
           <p class="comen"><?php echo $comentario["comentario"]; ?></p>
         </div>
         </div>
         </div>
         </li>
         </ul>
         </div>
         <?php endforeach;  ?>
       <?php endif; ?>
         </div>
       </div>
        
      </div>
      
    </div>
<div class="container">
<div class="row">
  <div class="col-lg-8">
    <input type="hidden" value="<?php echo $nombre_usuario;?>" id="usua" name="usua">
    <input type="hidden" value="<?php echo $id_noticia;?>" id="id_noti" name="id_noti">
    <div class="form-group">
    <label for="asunto">Asunto:</label>
    <input type="text" class="form-control" placeholder="Ingresa tu Asunto" name="asunto" id="asunto">
    </div>
    <div class="form-group">
    <label for="comentario">Comentar:</label>
    <textarea class="form-control" name="comentario"  placeholder="Ingresa tu Comentario" id="comentario"></textarea>
    </div>
    <button class="btn btn-default btn-block" id="comentar">Comentar</button>
    <br>
    <a href="./" class="btn btn-primary btn-block">Volver</a>
  </div>
</div>
  
</div>
<br>


<!--***************************|
       REDES SOCIALES  
*****************************  |-->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" target="_blank" class="icon icon-facebook2"></a></li>
    <li><a href="https://www.instagram.com/marquina_abreu" target="_blank" class="icon icon-instagram"></a></li>
    <li><a href="#" target="_blank" class="icon icon-twitter"></a></li>
    <li><a href="#" target="_blank" class="icon icon-google-plus3"></a></li>
</ul>
</div>


<br><br><br><br>
<?php include("footer.php"); ?>
<?php include_once("../modales.php"); ?>
<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
