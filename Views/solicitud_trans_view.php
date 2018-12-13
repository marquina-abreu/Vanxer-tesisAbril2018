
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
    <script src="Ajax/registro_solicitud.js"></script>
</head>
<body>
<?php include_once("header_principal.php");?>

    <br/><br/><br><br/>
    <div id="hecho">
    	
    </div>
    <br>
    <div class="container">
	<h3 class="section-heading hidden-xs"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Solicitudes a Transportistas</h3>
  <h4 class="section-heading visible-xs"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Solicitudes a Transportistas</h4>
  <hr>
	</div>

    <script>
    function showselect(str) {
        var xmlhttp;
        if (str=="") {
            document.getElementById('txtHint').innerHTML="";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200)  {
            
            document.getElementById('vanero').innerHTML = xmlhttp.responseText; 
        }
      }
    xmlhttp.open("GET","trans_ubicacion.php?c="+str,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }
    </script> 

<script>
    function mostrar_turno(id_tr) {
        var xmlhttp;
        if (id_tr=="") {
            document.getElementById('txtHint').innerHTML="";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200) /*Peticion ha sido Finalizada y exitosa..*/ {
            // Me Traigo los resultados de la DB..
            document.getElementById('traer_info').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","info_trans_solic.php?id_tr="+id_tr,true);
    xmlhttp.send();    
    }
</script> 
	<div class="container">
	<div class="row">
	<div class="col-lg-8 col-sm-12 col-xs-12">
		<div class="form-group">
		<label for="ubicacion">Elija su Ubicación:</label>
		<select class=" form-control" name="ubicacion" onchange="showselect(this.value)" id="ubicacion"><a href="#"></a><span class="glyphicon glyphicon-info-sign"></span>
            <option value="ninguno" selected disabled>Seleccione una ubicacion</option>
            <?php foreach ($resul_zona as $zona): ?>
            <option value="<?php echo $zona["id_zona"];?>"><?php echo $zona["nombre_zona"];?></option>
            <?php endforeach; ?>
        </select>
		</div>
	</div>
	<div class="pull-right col-lg-3">
		<img src="imagenes/Solo_la_V.png" style="position:absolute;" class="img-responsive visible-lg">
		
	</div>
	</div>
	</div>
	<div class="container">
	<div class="row">
	<div class="col-lg-8 col-sm-12 col-xs-12">
		<div class="form-group">
     <label for="transpor">Transportista:</label>
             <div id="vanero">
                <select class=" form-control" disabled="disabled">
                             
                </select>
             </div>
     </div>
	</div>
	</div>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
	<div id="traer_info">
 	 </div>
	</div>	
	</div>
	<br>
	<div id="hechoo">
			
		</div>
	<div class="row">
	<div id="coment" class="collapse col-lg-6">
	 <form id="formulario_registro_cli">
	    <div class="form-group">
			   <label for="nombre_cli">Nombre:</label>
			<input type="text" name="nombre_cli" id="nombre_cli" placeholder="Ingrese su Nombre" class="form-control">
			<span class="glyphicon form-control-feedback" ></span>
		</div>
		<div class="form-group">
			   <label for="apellido_cli">Apellido:</label>
			<input type="text" name="apellido_cli" id="apellido_cli" placeholder="Ingrese su Apellido" class="form-control">
			<span class="glyphicon form-control-feedback" ></span>
		</div>
		<div class="form-group">
			   <label for="correo_cli">Correo:</label>
			<input type="text" name="correo_cli" id="correo_cli" placeholder="Ingrese su Correo" class="form-control">
			<span class="glyphicon form-control-feedback" ></span>
		</div>
		<div class="form-group">
			   <label for="telefono_cli">Telefono:</label>
			<input type="text" name="telefono_cli" id="telefono_cli" placeholder="Ingrese su Telefono" class="form-control">
			<span class="glyphicon form-control-feedback" ></span>
		</div>
		<div class="form-group">
			   <label for="coment_visi">Comentario:</label>
			<textarea class="form-control" name="coment_visi" placeholder="Ingrese su Comentario" id="coment_visi"></textarea>
			<span class="glyphicon form-control-feedback" ></span>
		</div>
		
		<button type="submit" id="enviar_solic" class="btn btn-default btn-block">Enviar solicitud</button>
    <br>
    <a href="./" class="btn btn-primary btn-block">Volver</a>
		</form>
	</div>
  
	</div>
	</div>
	
	<br><br>

<br><br>
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
