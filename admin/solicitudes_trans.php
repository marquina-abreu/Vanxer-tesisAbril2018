<?php include_once("../pdo_conexion.php"); ?>
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
  $sql= $conexion->prepare("SELECT * FROM solicitud_trans");
  $sql->execute();
  $result=$sql->fetchAll();
?>

<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br/>
    <br/><br/>
    <hr class="section-heading-spacer"> 
    <br>
    <div class="container">
    <div class="row">
    <div class="col-lg-5 col-md-8">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Solicitudes de Transportistas</h3>
      <br>
       <table class ="table table-responsive table-striped table-bordered table-hover">
      <thead style="background-color:black; color:white;">
      <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
      <th>Van</th>
      <th>Cantidad</th>
      <th>Correo</th>
      <th>Config</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $solicitud):?>
         <tr>
          <td id="nombre_cli"><?php echo $solicitud["nombre_tr"]; ?></td>
          <td id="apellido_cl"><?php echo $solicitud["apellido_tr"]; ?></td>
          <td><?php echo $solicitud["telefono"]; ?></td>
          <td><?php echo $solicitud["modelo_va"]; ?></td>
          <td><?php echo $solicitud["cantidad_t"]; ?></td>
          <td><?php echo $solicitud["correo"]; ?></td>
          <td><li class="dropdown" style="list-style:none;"><a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button">Opciones<span class="caret">
      </span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a id="enviar_cod"  href="crear_codigo.php?n=<?php echo $solicitud["id_solicitud_trans"]; ?>">Crear codigo</a></li>
        <li><a href="borrar_solicitud_cliente.php?n=<?php echo $solicitud["nombre_cl"];?>&a=<?php echo $solicitud["apellido_cl"]; ?>&t=<?php echo $id_transportista?>">Rechazar</a></li>
      </ul></li></td>
         </tr>
         <?php endforeach; ?>
     </tbody>
    </table>
                   
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
