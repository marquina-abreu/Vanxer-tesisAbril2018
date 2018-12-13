<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="Style/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Style/style1.css">
  <link rel="stylesheet" type="text/css" href="Style/Style_paginacion.css">
  <link rel="stylesheet"  href="fonts.css">
  <script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "header_transportista.php"; ?>
<br><br/><br>
<br/><br/>
    
  <section class="nueva_noticia container">
                  <div class="post">
                  <article>
                   <div>
                    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Editar Noticia</h3>
                    <hr class="section-heading-spacer">
                    </div>
                    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-group">
                      <input type="hidden" value="<?php echo $noticia["id_noticia"];?>" name="id">
                      <input type="text" class="form-control" name="titulo" value="<?php echo $noticia["titulo_trans"];?>">
                      <br>
                      <input type="text" class="form-control" name="extracto" value="<?php echo $noticia["extracto_trans"];?>">
                      <br>
                      <textarea name="texto" class="form-control"><?php echo $noticia["texto_trans"];?></textarea>
                      <br>
                      <input class="form-control" type="file" name="thumb">
                      <input type="hidden" name="thumb-guardada" value="<?php echo $noticia["thumb"];?>"> <!--Aqui guardare los datos sin mostrarlos... "hidden"-->
                      </div>
                      <button type="submit" class="btn btn-default btn-block">Modificar</button><br>
                      <a href="index_transportista.php" class="btn btn-primary btn-block">Volver</a>
                    </form>
                    </article>
                    </div>                   

                  </section>

<!--REDES SOCIALES -->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="#" class="icon icon-facebook2"></a></li>
    <li><a href="#" class="icon icon-instagram"></a></li>
    <li><a href="#" class="icon icon-twitter"></a></li>
    <li><a href="#" class="icon icon-google-plus3"></a></li>
</ul>
</div>
<br><br>
<?php include_once("footer.php"); ?>
<?php include_once("modales.php"); ?>
<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>