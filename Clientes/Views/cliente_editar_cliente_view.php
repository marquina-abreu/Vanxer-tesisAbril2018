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
<!--|****************************
          SLIDESHOW
*******************************|-->
    <br/><br/><br>
	<section class="container">
            <h2 class="section-heading hidden-xs "><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Datos Basicos</h2>
            <h3 class="section-heading visible-xs"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Datos Basicos</h3>
            <hr class="section-heading-spacer">
            <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-10">
                <center>
                <label>Codigo:</label>
                <p class="text-success"><?php echo $datos["id_cod_ver"]?></p>
                <label>Fecha de Suscripción:</label>
                <p class="text-success"><?php echo fecha($datos["fecha_registro"]) ?></p>
                </center>
            	<form action="editar_perfil_cli.php" enctype="multipart/form-data" id="formulario_registro" method="POST">
                
                <div class="form-group">
                <center>
                <label>Foto de perfil</label>
                <img src='foto_perfil/<?php echo $datos['imagen_cli']?>' class='thumbnail' style='width:210px; height:230px;'>
                </center>
                <label>Editar foto de perfil</label>
                <input class="form-control" type="file" name="thumb">
                <input type="hidden" name="thumb-guardada" value="<?php echo $datos["imagen_cli"]?>">
                    
                </div>

            	<div class="form-group">
            	<label>Nombre:</label><br>
            	<input type="text" class="form-control" name="nombre_new" value="<?php echo $datos["nombre_cli"]?>" id="nombre_new">
            	</div>

            	<div class="form-group">
            	<label>Apellido:</label><br>
            	<input type="text" class="form-control" name="apellido_new" value="<?php echo $datos["apellido_cli"]?>" id="apellido_new">
            	</div>

            	<div class="form-group">
            	<label>Telefono:</label><br>
            	<input type="text" class="form-control" name="telefono_new" value="<?php echo $datos["telefono"]?>" id="telefono_new">
            	</div>   
                         	
            	<input type="hidden" class="form-control" name="id_cli" value="<?php echo $datos["id_cliente"]?>">
                <input class="btn btn-default btn-block" type="submit" value="Actualizar" />
            	</form>
                <br>
                <a href="./" class="btn btn-primary btn-block">Volver</a>
            </div>
            </div>
            <br>
         
      </section>
<?php include_once("../modales.php"); ?>
<br/><br/><br><br>
<?php include_once("../footer.php");?>
<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
