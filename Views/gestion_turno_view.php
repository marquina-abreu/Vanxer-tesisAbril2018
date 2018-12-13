
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
  <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="Style/Style_paginacion.css">
	<link rel="stylesheet"  href="fonts.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <script src="Ajax/registro_turno_trans.js"></script>
    <script src="Ajax/eliminar_turno.js"></script>
    <script src="Ajax/info_turno_trans.js"></script>
    <script src="Ajax/datapicker.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "Header_transportista.php"; ?>
<?php 
$consul_tur= $conexion ->prepare("SELECT id_turno, nombre_tur, hora_recogida, hora_busqueda FROM turnos INNER JOIN trans_turno on turnos.id_turno=trans_turno.turno INNER JOIN transportistas on transportistas.id_transporte=trans_turno.transportista WHERE trans_turno.transportista=:id_trans");
$consul_tur->execute(array(
  ":id_trans"=>$id_transportista));

$turnos= $consul_tur->fetchAll();
if (empty($turnos)) {
	$nohay="<br><br><label class='lead text-danger'>No tiene turnos Inscritos <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
 ?>
	<br/><br/>
    
	<a name="turnoss"></a>
	<br/>
  <div class="container">
  <div class="row">
  <div class="col-lg-4 col-xs-12">
  <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Gestionar Turnos</h3>
  <hr class="section-heading-spacer">
  <br> 
   <div class="contenedor">
                  <section class="clientes">
                  <div class="panel panel-danger">
                   <div class="panel-heading">
                    <div class="page-heading"><h4 class="section-heading">Turnos elegidos</h4>
                    </div>
                    </div>
                    <ul>
                    <?php echo $nohay;?>
                      <?php foreach ($turnos as $turno): ?>
                        <li><p><?php echo $turno['nombre_tur']."<br>"."Hora de ida: <b>".$turno["hora_recogida"]."</b> "."hora de venida: <b>".$turno["hora_busqueda"]."</b>"?></p><a href="turno_abierto.php?id_turno=<?php echo $turno["id_turno"];?>" class="btn btn-primary">Entrar</a> <a href="#confirm_eli_turno" class="btn btn-warning" id="<?php echo $turno['id_turno']?>" data-toggle="modal" onclick="eliminar_tur(this.id,<?php echo $id_transportista ?>)">Borrar</a> <a href="#info_turno" data-toggle="modal" onclick="info_turno(<?php echo $turno['id_turno'];?>,<?php echo $id_transportista;?>)" class="btn btn-default" title="Info del Turno"><span class="glyphicon glyphicon-eye-open"></span></a></li>
                      <?php endforeach; ?>
                    </ul>
                    </div>
                  </section>
                    </div> 
   <a href="#registro_turno" class="btn btn-default btn-block" data-toggle="modal">Crear nuevo turno</a>
   <br>
   <a href="index_transportista.php" class="btn btn-primary btn-block">Volver</a>
  </div>                    
  </div>
  </div>
	 
                <br>

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