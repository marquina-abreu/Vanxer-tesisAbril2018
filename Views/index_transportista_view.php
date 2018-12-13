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
  <script src="Ajax/borrar_noticia.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
</head>
<body>

<?php require_once "header_transportista.php"; ?>

<?php 

$consul_tur= $conexion ->prepare("SELECT nombre_tur FROM turnos INNER JOIN trans_turno on turnos.id_turno=trans_turno.turno INNER JOIN transportistas on transportistas.id_transporte=trans_turno.transportista WHERE trans_turno.transportista=:id_trans");
$consul_tur->execute(array(
  ":id_trans"=>$id_transportista));

$turnos= $consul_tur->fetchAll();
if (empty($turnos)) {
  $nohay_tur="<br><br><label class='lead text-danger'>No tiene turnos Inscritos <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}

$noticias_trans= obtener_noticias_trans($blog_config["post_por_pagina"],$id_transportista,$conexion);

if (empty($noticias_trans)) {
  $nohay_noticia="<br><br><label class='lead text-danger'>No hay noticias <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
//CLIENTES
$resul= obtener_clientes_trans($blog_config["post_por_pagina_cli"],$id_transportista,$conexion_clientes);
if (empty($resul)) {
  $nohay="<br><br><label class='lead text-danger'>No hay Clientes Suscritos <span class='glyphicon glyphicon-exclamation-sign'></span></label><br><br>";
}
?>
<br><br/>
  <a name="mostrar_noti"></a>

    <br><br>

    <div class="container">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Tus Noticias Publicadas</h3>
    <hr class="section-heading-spacer"> 
    <div class="row">
    <div class="col-lg-6">
    
     <div class="contenedor">
                  <section class="clientes">
                  <div class="panel panel-danger">
                   <div class="panel-heading">
                    <div class="page-heading"><h4 class="section-heading">Publicaciones</h4>
                    </div>
                    </div>
                    <ul style="list-style:none; text-decoration:none;">
                    <?php echo $nohay_noticia;?>
                      <?php foreach ($noticias_trans as  $noticia): ?>
                       <li>
                    <h4 class="section-heading"><?php echo $noticia["titulo_trans"];?></h4>
                    <a href="editar_noticia.php?id=<?php echo $noticia["id_noticia"];?>" class="btn btn-default">Editar</a>
                    <a href="noticia_abierta_trans.php?id=<?php echo $noticia["id_noticia"];?>" class="btn btn-primary">Ver</a>
                    <a href="#confirm_noticia" data-toggle="modal" id="<?php echo $noticia["id_noticia"]?>" onclick="borrar_noti(this.id)" class="btn btn-warning">Borrar</a>
                       </li>
                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </section>
      </div> 
      <?php
      if (!empty($noticias_trans)) {
  include("paginacion_noticias_admin.php");}?>
    <a href="nueva_noticia.php?id_tr=<?php echo $id_transportista;?>" class="btn btn-primary btn-block">Nueva Noticia</a>
      </div>              
      </div>
      
      </div>
    <br>

  <a  id="clientes_mostrar" ></a>
                <br>
  <div class="container">
  <div class="row">
  <div class="col-lg-4 col-xs-12">
  <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Turnos</h3>
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
                    <?php echo $nohay_tur;?>
                      <?php foreach ($turnos as $turno): ?>
                        <li><p><?php echo $turno['nombre_tur'];?></p> </li>
                          
                      <?php endforeach; ?>
                    </ul>
                    </div>
                  </section>
                    </div> 
   <a href="gestion_turno.php" class="btn btn-primary btn-block">Gestionar Turnos</a>
  </div>                    
  </div>
  </div>
  <br>
  <a id="pag_cli"></a>
  <div class="container">
  <div class="row">
  <div class="col-lg-4 col-xs-12">
  <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span>Total de Clientes</h3>
  <hr class="section-heading-spacer"> 
  <br> 
   <div class="contenedor">
                  <section class="clientes">
                  <div class="panel panel-danger">
                   <div class="panel-heading">
                    <div class="page-heading"><h4 class="section-heading">Clientes Suscritos</h4>
                    </div>
                    </div>
                    <ul>
                    <?php echo $nohay;?>
                      <?php foreach ($resul as $cliente): ?>
                        <li><p><?php echo $cliente['nombre_cli']." ".$cliente["apellido_cli"]?></p></li>
                          
                      <?php endforeach; ?>
                    </ul>
                    </div>
                  </section>
                    </div> 
         <?php
         if (!empty($resul)) { 
         include("paginacion_clientes.php"); 
         }?>
   <a href="Clientes_tr/gestion_clientes.php#clientes" class="btn btn-primary btn-block">Gestionar Clientes</a>
  </div>                    
  </div>
  </div>
  <br>

<br><br><br><br>
<?php include_once("footer.php"); ?>
<!--REDES SOCIALES -->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" class="icon icon-facebook2"></a></li>
    <li><a href="https://www.instagram.com/marquina_abreu/" class="icon icon-instagram"></a></li>
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