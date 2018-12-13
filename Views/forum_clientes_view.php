<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <link rel="stylesheet"  href="Style/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="Style/style1.css"/>
    <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="stylesheet"  href="fonts.css"/>
	<script src="jq/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <script src="Ajax/Login.js"></script>
    <script src="Ajax/efectos_disponible_usuario.js"></script>
</head>
<body>
<?php include_once("header_principal.php");?>
<!--|****************************
          SLIDESHOW
*******************************|-->
    <br/><br/><br><br/>
    

    <hr class="section-heading-spacer">
    <div class="container">
    <div class="row">
    <div class="col-lg-6">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Requisitos para el Cliente</h3><br>

    <p style="font-family:helvetica,sans-serif;">Para formar parte de <b>Vanxer&copy</b> como transportista de dicha zona, en
    primer lugar debes contactar a el administrador, para que luego llene el presente formulario, el cual cada transportista debe como 
    1er paso; crear un usuario cumpliendo con las validaciones, como 2do paso; el transportista debera rellenar sus datos personales, el cual debe contener su correo electronico personal o de trabajo, para recibir correos de <b>Vanxer&copy</b>, si no posee un correo electronico, le recomendamos crearlo en el siguiente enlace <a href="../../../https://www.gmail.com" target="_blank">wwww.gmail.com</a>.
    3er paso; Registrar los datos del vehiculo y como ultimo e importante paso, sera elegir la ubicación a la cual quiere formar parte para prestar servicio como transportista.</p>
    <br>
    <p style="font-family:helvetica,sans-serif;">Correo de <b>Vanxer&copy</b>: Vanxer@gmail.com
    <br>Numero de contacto: 0424-1766109</p>
    <br>
    <p style="font-family:helvetica,sans-serif;">Para formar parte de <b>Vanxer&copy</b> como transportista de dicha zona, en
    primer lugar debes contactar a el administrador, para que luego llene el presente formulario, el cual cada transportista debe como 
    1er paso; crear un usuario cumpliendo con las validaciones, como 2do paso; el transportista debera rellenar sus datos personales, el cual debe contener su correo electronico personal o de trabajo, para recibir correos de <b>Vanxer&copy</b>, si no posee un correo electronico, le recomendamos crearlo en el siguiente enlace <a href="../../../https://www.gmail.com" target="_blank">wwww.gmail.com</a>.
    3er paso; Registrar los datos del vehiculo y como ultimo e importante paso, sera elegir la ubicación a la cual quiere formar parte para prestar servicio como transportista.</p>
    <br>
    <p style="font-family:helvetica,sans-serif;">Correo de <b>Vanxer&copy</b>: Vanxer@gmail.com
    <br>Numero de contacto: 0424-1766109</p>
    <br>
    
    <br>
    <p style="font-family:helvetica,sans-serif;">Correo de <b>Vanxer&copy</b>: Vanxer@gmail.com
    <br>Numero de contacto: 0424-1766109</p>
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
        if (this.readyState === 4 && this.status === 200)  {
            // Me Traigo los resultados de la DB..
            document.getElementById('turno_volcado').innerHTML = xmlhttp.responseText; 
        }
      }
    xmlhttp.open("GET","trans_turno.php?id_tr="+id_tr,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }
</script> 

    <div class="col-lg-6">
     <form action="forum_clientes.php" enctype="multipart/form-data" id="formulario_registro_cli" method="POST">
     <br><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Codigo:</label>
     <input type="text" class="form-control" placeholder="Ingrese el codigo de Verificación" name="cod">
     <p>¿No posees un codigo de permiso? Solicitalo</p><a href="solicitud_trans.php">Aqui!</a>
     </div>
     <div>
         <?php echo $mensaje; ?>
     </div>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 1. Elija a que zona desea su servicio</h4><br>
     <div class="form-group">
     <label for="ubicacion">Zona:</label>
                             <select class=" form-control" name="ubicacion" onchange="showselect(this.value)" id="ubicacion"><a href="#"></a><span class="glyphicon glyphicon-info-sign"></span>
                             <option value="ninguno" selected disabled>Seleccione una ubicacion</option>
                             <?php foreach ($resul_zona as $zona): ?>
                             <option value="<?php echo $zona["id_zona"];?>"><?php echo $zona["nombre_zona"];?></option>
                             <?php endforeach; ?>
                             </select>
     </div>
     
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 2. Escoja al Transportista</h4><br>
     <div class="form-group">
     <label for="ubicacion">Transportista:</label>
             <div id="vanero">
                <select class=" form-control" disabled="disabled">
                             
                </select>
             </div>
     </div>
     
     
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 3. Turnos Disponibles</h4><br>
     <div class="form-group">
     <label for="Turno">Turno:</label>
            <div id="turno_volcado">
                    <select class=" form-control" disabled="disabled">
                             
                    </select>
            </div>
    </div>
     <br>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 4. Registre un Usuario</h4><br>
     <div class="form-group ">
     <label><span class="glyphicon glyphicon-user"></span> Usuario:</label>
     <input type="text" class="form-control" placeholder="Ingrese un usuario" id="usuario_cli" name="usuario_cli">
     <div id="Info"></div>
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group has-feedback">
     <label><span class="glyphicon glyphicon-eye-close"></span> Contraseña:</label> 
     <input type="password" class="form-control" placeholder="Ingrese una contraseña" id="contrasenna_cli" name="contrasenna_cli">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <input type="hidden" class="form-control" name="priv" value="3">
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 5. Registre sus Datos</h4><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-eye-close"></span> Imagen de perfil:</label>
     <input class="form-control" type="file"  name="thumb">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group has-feedback">
     <label><span class="glyphicon glyphicon-user"></span> Nombre:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Nombre" id="nombre_cli" onkeypress="return soloLetra(event)" name="nombre_cli">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group has-feedback">
     <label><span class="glyphicon glyphicon-user"></span> Apellido:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Apellido" id="apellido_cli" onkeypress="return soloLetra(event)" name="apellido_cli">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group has-feedback">
     <label><span class="glyphicon glyphicon-user"></span> Correo:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Correo" id="correo_cli" name="correo_cli">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group has-feedback">
     <label><span class="glyphicon glyphicon-user"></span> Telefono:</label>
     <input type="text" class="form-control" placeholder="Ingrese su numero" id="telefono_cli" name="telefono_cli">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     	<button type="submit" class="btn btn-primary">Registrar</button>
     
    </form>
    </div>

    <br>
    </div>
    <br>

    </div>
	

<br><br><br>
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

<?php include_once("modales.php"); ?>

<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
