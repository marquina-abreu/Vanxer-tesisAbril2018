
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
	<link rel="stylesheet"  href="bootstrap-toggle-master/css/bootstrap-toggle.min.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <script src="Ajax/registro_turno_trans.js"></script>
    <script src="Ajax/turno_abierto_infocli.js"></script>
    <script src="Ajax/expulsar_cli_turno.js"></script>
    <script src="Ajax/estado_cliente.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>
<?php require "Header_transportista.php"; ?>
<?php 

$consul_turnos_cli= $conexion->prepare("SELECT clientes.* FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:id_trans_cli AND cliente_turno.turno_cli=:id_turno_cli");
$consul_turnos_cli->execute(array(
	":id_trans_cli"=>$id_transportista,
	":id_turno_cli"=>$turno_selec));
$resultado_cli= $consul_turnos_cli->fetchAll();
if (empty($resultado_cli)) {
	$nohay="<br><br><label class='lead text-danger'>No hay Clientes registrados <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}

$con=$conexion->prepare("SELECT nombre_tur FROM turnos INNER JOIN trans_turno on turnos.id_turno=trans_turno.turno INNER JOIN transportistas on transportistas.id_transporte=trans_turno.transportista WHERE trans_turno.transportista=:id_trans AND trans_turno.turno=:turno_se");
$con->execute(array(
	":id_trans"=>$id_transportista,
	":turno_se"=>$turno_selec));
$nombre_turno=$con->fetch();
 ?>
<br><br/>
	<br/><br/>
    <hr class="section-heading-spacer">
	<br/>
  <div class="container">
  <div class="row">
  <div class="col-lg-4 col-xs-12">
  <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Gestionar Turno <?php echo $nombre_turno["nombre_tur"]?></h3>
  <br> 
   <div class="contenedor">
                  <section class="clientes">
                  <div class="panel panel-danger">
                   <div class="panel-heading">
                    <div class="page-heading"><h4 class="section-heading">Clientes Inscritos</h4>
                    </div>
                    </div>
                    <div id="cambiar_estado">
                    <ul>
                    <?php echo $nohay;?>
                    
                      <?php foreach ($resultado_cli as $cliente): ?>
                      <?php
                      $sql=$conexion->prepare("SELECT estado FROM clientes WHERE id_cliente=:id_cli");
                      $sql->execute(array(":id_cli"=>$cliente['id_cliente']));
                      $resul_esta= $sql->fetch();
                      $resul_esta=$resul_esta["0"];
                      $estado="";
                      if ($resul_esta==1) {
                        $estado.="Deshabilitar";
                      }else{
                        $estado.="Habilitar";
                      }
                      ?>
                        <li>
                        <p><?php echo $cliente['nombre_cli']." ".$cliente["apellido_cli"]?></p>
                        <a href="#visualizar_cli" data-toggle="modal" class="btn btn-primary" id="<?php echo $cliente["id_cliente"] ?>" onclick="mostrar_info(this.id)">Ver</a> 
                        <a href="#confirm_ex_turno" data-toggle="modal" id="<?php echo $cliente["id_cliente"] ?>" class="btn btn-warning" onclick="expulsar(this.id,<?php echo $turno_selec?>)">Expulsar</a>
                        
                        <button class="btn btn-default" value="<?php echo $cliente["id_cliente"] ?>" onclick="cambiar(this.value,<?php echo $id_transportista?>,<?php echo $turno_selec?>)"><?php echo $estado?></button>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                    </div>
                    </div>
                  </section>
                  <?php
                  if (!empty($resultado_cli)) {
                    echo "<form action='Clientes_tr/reporte_pdf_clientes/reporte_cliente_turno.php' method='POST' target='_blank'>";
                    echo "<input type='hidden' name='it' value='".$id_transportista."'>";
                    echo "<input type='hidden' name='itr' value='".$turno_selec."'>";
                    echo "<button type='submit' class='btn btn-default btn-block' >Imprimir Lista</button>";
                    echo "</form>";
                    echo "<br>";
                  }
                   ?>
                   <a href="gestion_turno.php#turnoss"  class="btn btn-primary btn-block">Volver</a>
                    </div> 
   
  </div>                    
  </div>
  </div>
	 
                
<br><br><br><br><br><br>
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
<script src="bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>