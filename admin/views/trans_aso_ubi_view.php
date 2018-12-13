
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
  include "header_admin.php";

  $idzotraida=$_GET["id_as"];

  $sql= $conexion->prepare("SELECT * FROM usuarios INNER JOIN transportistas ON transportistas.id_usuario_trans=usuarios.id_usuario INNER JOIN zona ON transportistas.id_zona_trans=zona.id_zona WHERE zona.id_zona=:idzona");
  $sql->execute(array(
    ":idzona"=>$idzotraida));
  $result=$sql->fetchAll();
?>

<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br/>
	<?php include_once("slider.php") ?>
    <br/><br/>
    <hr class="section-heading-spacer">
	<section class="container"><center><img src="../imagenes/Logo_vanxer2.png" class="img-responsive"></center></section>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-lg-5 col-md-8">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Zonas</h3>
      <br>
      
      <table class ="table table-responsive table-striped table-bordered table-hover">
                     <thead>
                     <tr>
                     <th>Usuario</th>                     
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Telefono</th>
                     <th>Correo</th>
                     <th>Opciones</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($result as $trans):?>
                      <tr>
                        <td><?php echo $trans["usuario"] ?></td>
                        <td><?php echo $trans["nombre_trans"] ?></td>
                        <td><?php echo $trans["apellido_trans"] ?></td>
                        <td><?php echo $trans["telefono_trans"] ?></td>
                        <td><?php echo $trans["correo_trans"] ?></td>
                        <td>
            <li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                   <li><a href="trans_aso_ubi.php?id_as=<?php echo $zona["id_zona"] ?>">Gestionar</a></li>
                   <li><a href="editar_ubi.php?id_as=<?php echo $zona["id_zona"] ?>">Ver info Resumida</a></li>
                    <li><a href="#confirm_gestion" id="<?php echo $zona["id_zona"] ?>"  data-toggle="modal">Editar info</a></li>
                    </ul></li></td>
                      </tr>
                     <?php endforeach; ?>
                    </tbody>
                   </table>
                   <br>
                   <a href="index.php" class="btn btn-primary">Volver</a>
                   <br>
                   <br><br>
          </div>
          <div class="pull-right col-lg-3">
    <img src="../imagenes/Solo_la_V.png" style="position:absolute; width:300px;  " class="img-responsive visible-lg"> 
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
