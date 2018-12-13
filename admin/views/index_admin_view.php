
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../Style/Style_paginacion.css">
  <link rel="stylesheet" type="text/css" href="../Style/style1.css">
	<link rel="stylesheet"  href="../fonts.css">
	<script src="../jq/jquery-3.2.1.min.js"></script>
  <script src="../js/JqueryValidate.js"></script>
  <script src="../Ajax/edit_zonas.js"></script>
  <script src="../Ajax/aplicar_cam_zona.js"></script>
    <link rel="icon" href="../imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php
  include "header_admin.php";
  $sql= $conexion->prepare("SELECT * FROM zona");
  $sql->execute();
  $result=$sql->fetchAll();
?>

<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br/>
	<?php include_once("slider.php") ?>
    <br/><br/>
    <hr class="section-heading-spacer"> 
    <br>
    <div class="container">
    <div class="row">
    <div class="col-lg-5 col-md-8">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Zonas</h3>
      <br>
      <table class ="table table-striped table-bordered table-hover table-responsive" id="tabla">
                     <thead>
                     <tr>
                     <th>Zonas</th>                     
                     <th>Opciones</th>
                     <th>Editar Zona</th>
                     <th>Borrar Zona</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($result as $zona):?>
                      <tr>
                        <td><?php echo $zona["nombre_zona"] ?></td>
                        <td>
            <li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                   <li><a href="trans_aso_ubi.php?id_as=<?php echo $zona["id_zona"] ?>">Ver Transportistas Asociados</a></li>
                   <li><a href="editar_ubi.php?id_as=<?php echo $zona["id_zona"] ?>" onclick="edit_zona(<?php echo $zona["id_zona"]?>)">Editar zona</a></li>
                    <li><a href="#confirm_gestion" id="<?php echo $zona["id_zona"] ?>"  data-toggle="modal">Borrar zona</a></li>
                    </ul></li></td>
                    <td><a href="#edit_zona" data-toggle="modal" onclick="edit_zona(<?php echo $zona["id_zona"]?>)" class="btn btn-info">Editar</a></td>
                    <td><button class="btn btn-danger">Borrar</button></td>
                      </tr>
                     <?php endforeach; ?>
                    </tbody>
                   </table>
                   <br>
                   <button class="btn btn-primary">Registrar nueva Zona</button>
                   <br><br>
          </div>
          </div>
    </div>
   


<?php include_once("footer.php"); ?>
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
