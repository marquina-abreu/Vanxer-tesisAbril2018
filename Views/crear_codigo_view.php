
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
	<link rel="stylesheet"  href="fonts.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="Ajax/Login.js"></script>
    <script src="Ajax/registro_codi_verf.js"></script>
</head>
<body>
<?php 

include_once("header_transportista.php");

?>


<!--|****************************
          SLIDESHOW
*******************************|-->
<script type="text/javascript">
  $(document).ready(function(){
  $("#gene").click(function(){
       $.ajax(
               {
              url : 'generar_codi_cli.php',
              type: "POST",
              data : {
                      codi: <?php 
                      echo $id_transportista 
                      ?>}
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
    <br/><br/><br><br/>
    <div class="container">
	<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Creación de codigo</h3>
	</div>
	<br><br>
	<div class="container">
	<div class="row">
	
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
              <div class="col-lg-5 col-md-10 col-sm-11 col-xs-12">
              <div class="form-group">
               <label>Codigo:</label>
               <div style="display:inline-block;" id="codgenerado">
                <input type="text" name="codi" id="codi" class="form-control" style="width:80%; display:inline-block;" readonly="readonly">
               </div>
                <a id="gene" class="btn btn-info">Generar <span class="glyphicon glyphicon-retweet"></span></a>
              </div>
              <div id="resp"></div>

              <div class="form-group">
               <label>Nombre:</label>
               <p><?php echo $res["nombre_cl"]; ?></p>
              </div>
              <div class="form-group">
               <label>Apellido:</label>
                <p><?php echo $res["apellido_cl"]; ?></p>
              </div>
              <div class="form-group">
               <label>El codigo se enviara al correo:</label>
                <p><?php echo $res["correo_soli"]; ?></p>
              </div>
              <input type="hidden" name="trans" id="trans" value="<?php echo $id_transportista; ?>">
              <input type="hidden" name="idsoli" id="idsoli" value="<?php echo $res["id_solicitud"]; ?>">
              <br>
              <button type="submit" class="btn btn-default btn-block" id="crear_c">Crear codigo</button>
              <br>
              <a href="solictud_clientes.php" class="btn btn-primary btn-block">Volver</a>
              </div>
              </div>
                </div>
              <br>
              </div>
                  
      
      </div> 
	  </div>
	  </div>

<br><br><br><br>
<?php include_once("footer.php");?>
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

<?php include_once("modales.php"); ?>

<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
