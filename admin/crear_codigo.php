<?php
include_once("../pdo_conexion.php");
$id=$_GET["n"];

$sql=$conexion->prepare("SELECT * FROM solicitud_trans WHERE id_solicitud_trans =:id");
$sql->execute(array(":id"=>$id));

$result=$sql->fetch();

?>
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
<?php include "header_admin.php"; ?>

<br/><br/><br><br/>
    <div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Creación de codigo</h3>
	</div>
	<br><br>
	<div class="container">
	<div class="row">
	<script type="text/javascript">
  $(document).ready(function(){
  $("#gene").click(function(){
       $.ajax(
               {
              url : 'generarcod.php',
              type: "POST",
              data : {
                      }
                })
                  .done(function(data) {
                      if(data){
                      $("#codgenerado").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});
</script>
	  <div class="col-lg-5 col-md-5 col-sm-11 col-xs-12 ">
            <div class="panel panel-default">
             <div class="panel-heading">
              <div class="page-heading"><h4 class="section-heading">Crear codigo</h4>
              </div>
              </div>
              <br>
              <a id="cod"></a>
              <div class="container">
              <div class="row">
              <div class="col-lg-5">
              <form action="registrar_codigo.php" method="POST">
              <div class="form-group">
               <label>Codigo:</label>
               <div id="codgenerado">
                <input type="text" name="codi" id="codi" class="form-control" readonly=''>
                </div>
                <br>
                <a id="gene" class="btn btn-info">Generar <span class="glyphicon glyphicon-retweet"></span></a>
              </div>
              <div id="resp"></div>

              <div class="form-group">
               <label>Nombre:</label>
               <p><?php echo $result["nombre_tr"]; ?></p>
              </div>
              <div class="form-group">
               <label>Apellido:</label>
                <p><?php echo $result["apellido_tr"]; ?></p>
              </div>
              <div class="form-group">
               <label>Correo a enviar codigo:</label>
                <p><?php echo $result["correo"]; ?></p>
              </div>
              <input type="hidden" name="trans" id="trans" value="<?php echo htmlspecialchars(json_encode($id)); ?>">
              <br>
              <button type="submit" class="btn btn-primary" id="crear_c">Crear codigo</button>
              </form>
              </div>
              </div>
                </div>
              <br>
              </div>
                  
      
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
