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
</head>
<body>
<?php include_once("header_principal.php");?>

    <br/><br/><br><br/>

    <hr class="section-heading-spacer">
    <div class="container">
    <div class="row">
    <div class="col-lg-6">
    <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Requisitos para el Transportista</h3><br>

    <p style="font-family:helvetica,sans-serif;">Para formar parte de <b>Vanxer&copy</b> como transportista de dicha zona, en
    primer lugar debes contactar a el administrador, para que luego llene el presente formulario, el cual cada transportista debe como 
    1er paso; crear un usuario cumpliendo con las validaciones, como 2do paso; el transportista debera rellenar sus datos personales, el cual debe contener su correo electronico personal o de trabajo, para recibir correos de <b>Vanxer&copy</b>, si no posee un correo electronico, le recomendamos crearlo en el siguiente enlace <a href="../../../https://www.gmail.com" target="_blank">wwww.gmail.com</a>.
    3er paso; Registrar los datos del vehiculo y como ultimo e importante paso, sera elegir la ubicación a la cual quiere formar parte para prestar servicio como transportista.</p>
    <br>
    <p style="font-family:helvetica,sans-serif;">Correo de <b>Vanxer&copy</b>: Vanxer@gmail.com
    <br>Numero de contacto: 0424-1766109</p>
    <br>
    <p style="font-family:helvetica,sans-serif;">Para formar parte de <b>Street Transport</b> como transportista de dicha zona, en
    primer lugar debes contactar a el administrador, para que luego llene el presente formulario, el cual cada transportista debe como 
    1er paso; crear un usuario cumpliendo con las validaciones, como 2do paso; el transportista debera rellenar sus datos personales, el cual debe contener su correo electronico personal o de trabajo, para recibir correos de <b>Street Transport</b>, si no posee un correo electronico, le recomendamos crearlo en el siguiente enlace <a href="../../../https://www.gmail.com" target="_blank">wwww.gmail.com</a>.
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
    
    </div>

    <div class="col-lg-6">
     <form enctype="multipart/form-data" id="formulario_trans" action="registro_transporte.php" method="POST">
     <br><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Codigo:</label>
     <input type="text" class="form-control" placeholder="Ingrese el codigo de Verificación" name="cod">
     <span class="glyphicon form-control-feedback" ></span>
     <p>¿No posees un codigo de permiso? Solicitalo</p><a href="solicitar/">Aqui!</a>
     </div>
     <div>
         <?php echo $mensaje; ?>
     </div>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 1. Registre un Usuario</h4><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Usuario:</label>
     <input type="text" class="form-control" placeholder="Ingrese un usuario" id="usuario_trans" name="usuario_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-eye-close"></span> Contraseña:</label>	
     <input type="password" class="form-control" placeholder="Ingrese una contraseña" id="contrasenna_trans" name="contrasenna_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-eye-close"></span> Imagen de perfil:</label>
     <input class="form-control" type="file"  name="thumb">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <input type="hidden" class="form-control" name="priv" value="2">
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 2. Registre sus Datos</h4><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Nombre:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Nombre" id="nombre_trans" onkeypress="return soloLetra(event)" name="nombre_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Apellido:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Apellido" id="apellido_trans" onkeypress="return soloLetra(event)" name="apellido_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Correo:</label>
     <input type="text" class="form-control" placeholder="Ingrese su Correo" id="correo_trans" name="correo_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Telefono:</label>
     <input type="text" class="form-control" placeholder="Ingrese su numero" id="telefono_trans" name="telefono_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 3. Registre Datos de la Van</h4><br>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-eye-close"></span> Imagen de la van:</label>
     <input class="form-control" type="file" name="thumb2">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Placa:</label>
     <input type="text" class="form-control" placeholder="Ingrese la Placa del auto" id="placa_trans" name="placa_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Modelo de auto:</label>
     <input type="text" class="form-control" placeholder="Ingrese el modelo del auto" id="modelo_trans" name="modelo_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Año:</label>
     <input type="text" class="form-control" placeholder="Ingrese el año del auto" id="anno_trans" name="anno_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Capacidad:</label>
     <input type="number" max="18" class="form-control" placeholder="Ingrese la capacidad" id="cap_trans" name="cap_trans">
     <span class="glyphicon form-control-feedback" ></span>
     </div>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 4. Ubicación a trabajar</h4><br>
     <div class="form-group">
     <label for="ubicacion">Ubicación:</label>
                             <select class=" form-control" name="ubicacion" id="ubicacion">
                             <option selected disabled>Seleccione una ubicación</option>
                             <?php foreach ($resultado_ubi as $ubicacion): ?>
                             <option value="<?php echo $ubicacion["id_zona"];?>"><?php echo $ubicacion["nombre_zona"];?></option>
                             <?php endforeach; ?>
                             </select>
        <span class="glyphicon form-control-feedback" ></span>
     </div>
     <h4 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Paso 5. Registre sus credenciales de su cuenta MercadoPago</h4>
     <div class="fomr-group">
         <label><span class="glyphicon glyphicon-user"></span> Client ID:</label>
         <input type="text" placeholder="Ingrese su clientID" class="form-control" name="clientid" id="clientid"/>
         <p><b>(Opcional)</b></p>
         
     </div>
     <div class="form-group">
     <label><span class="glyphicon glyphicon-user"></span> Client Secret:</label>
         <input type="text" placeholder="Ingrese su ClientSecret" class="form-control" name="clientsecret" id="clientsecret"/>
         <p><b>(Opcional)</b></p>
    </div>
     <br>
     	<button type="submit" class="btn btn-primary">Registrar</button>
     </form>
    <br>
    </div>
    </div>
    </div>
	


<footer>
        <div class="container-fluid" style="background: black;">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <center>
                    <ul class="list-inline" >
                        
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about" style="text-decoration:none;">@marquina_abreu</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                            
                    </ul>
                 </center>
                    <center>
                    <p class="copyright text-muted small">Copyright &copy; Todos los derechos reservados 2017</p>
                    <p class="copyright text-muted small">Vanxer &copy</p>

                    </center>

                </div>
            </div>
        </div>
    </footer>
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
