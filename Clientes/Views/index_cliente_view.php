
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
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php
  include "Header_cliente.php";
?>
<?php 
$noticias= obtener_noticias_trans($blog_config["post_por_pagina"],$id_transportista,$conexion);

?>
<!--|****************************
          SLIDESHOW
*******************************|-->
<br>
    <div class="container">
    <a id="Noticias"></a>
    <br>
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> NOTICIAS</h3>
  <hr>
	</div>
	<br>
  <?php if ($resul_state==1) {?>
     <section class="container">
      <div class="row">
            <section class="posts col-lg-9"> 
      <?php foreach ($noticias as  $noticia): ?> 
      <?php 
          $con = $conexionn->prepare("SELECT COUNT(*) FROM Comentarios WHERE id_noticia_coment=:id");
          $con->execute(array(":id"=>$noticia["id_noticia"]));
          $comentarios_total=$con->fetch();
          $res=$comentarios_total["0"]; 
        ?>
    	
    		<article class="post clearfix">
    		    <a href="noticia_abierta.php?id=<?php echo $noticia["id_noticia"];?>" class="thumb pull-left">
    					<img src="../imagenes/<?php echo $noticia["thumb"];?>" class="thumbnail">
    		    </a>
    			<p class="lead post-title"><a href="noticia_abierta.php?id=<?php echo $noticia["id_noticia"];?>"><?php echo $noticia["titulo_trans"];?></a></p>
    			<p class="small"><?php echo fecha($noticia["fecha_trans"]);?></p>
    			<p class="extracto post-contenido text-justify"><?php echo $noticia["extracto_trans"];?></p>
    			<a href="noticia_abierta.php?id=<?php echo $noticia["id_noticia"];?>"><button class="btn btn-primary">Leer mas</button></a>
           <span class="badge" style=" background:white; color:black;"><img src="../imagenes/coment.png" class="img-responsive" style="width:30px; height:30px;"></span><p style="display:inline-block;"><b><?php echo $res;?></b></p>
    		</article>
      <?php endforeach;  ?>
    
    	<?php include_once("paginacion_noticias.php"); ?>
    	</section>
    	</div>
       
    

    </section>

  <?php }
  else {
    echo '
    <div class="container">
    <div class="row">
    <div class="col-lg-9">
    <h3 class="alert alert-danger"> Para poder visualizar las noticias hechas por su transportista y otros servicios, debe realizar su pago de inmediato!</h3>
    <p><b>Att:Vanxer™</b></p>
    <a href="gestionpagos/" class="btn btn-primary btn-block">Realizar Pago</a>
    </div>
    </div>
    </div>
    <br>
    <br>';
    }?>
<br><br><br><br>
<?php include("footer.php"); ?>
<!--***************************|
       REDES SOCIALES  
*****************************  |-->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" target="_blank" class="icon icon-facebook2"></a></li>
    <li><a href="#" target="_blank" class="icon icon-instagram"></a></li>
    <li><a href="#" target="_blank" class="icon icon-twitter"></a></li>
    <li><a href="#" target="_blank" class="icon icon-google-plus3"></a></li>
</ul>
</div>

<?php include_once("../modales.php"); ?>

<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
