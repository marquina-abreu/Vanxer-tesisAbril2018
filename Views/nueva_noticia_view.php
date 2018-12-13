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
<br><br/>

	<br>

	<div class="container">
                  <div class="row">
                  <div class="col-lg-7">
                   
                    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Nueva Noticia</h3>
                    <hr class="section-heading-spacer">
                    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-group">
                      <label>Titulo:</label>
                      <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo">
                      </div>
                      <div class="form-group">
                      <label>Extracto:</label>
                      <input type="text" class="form-control" name="extracto" placeholder="Ingrese el extracto">
                      </div>
                      <div class="form-group">
                      <label>Texto:</label>
                      <textarea name="texto" class="form-control" placeholder="Ingrese la información"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Imagen:</label>
                        <input class="form-control" type="file" name="thumb">
                      </div>
                      <input type="hidden" name="id_transporte" value="<?php echo $id_transportista;?>">
                      <button type="submit" class="btn btn-default btn-block">Publicar</button>
                    </form>
                    <br>
                    <a href="index_transportista.php" class="btn btn-primary btn-block">Volver</a>
                    </div>
                    </div>

                  </div>
                  <br><br><br><br>
<?php include_once("footer.php");?>

<!--REDES SOCIALES -->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="#" class="icon icon-facebook2"></a></li>
    <li><a href="#" class="icon icon-instagram"></a></li>
    <li><a href="#" class="icon icon-twitter"></a></li>
    <li><a href="#" class="icon icon-google-plus3"></a></li>
</ul>
</div>
<?php include_once("modales.php"); ?>
<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>