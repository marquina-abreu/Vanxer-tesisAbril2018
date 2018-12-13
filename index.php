
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Vanxer&copy</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/style1.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="stylesheet"  href="fonts.css">
	<script src="jq/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
    <script src="js/JqueryValidate.js"></script>
    <link rel="icon" href="imagenes/vanxerLogo.ico" type="image/x-icon">
    <script src="Ajax/Login.js"></script>
</head>
<body>
<?php include_once("header_principal.php");?>
<!--|****************************
          SLIDESHOW
*******************************|-->
<br><br/>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
		<div id="carousel-1" class="carousel slide" data-ride="carousel">
		<!--Indicadores..-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-1" data-slide-to="1"></li>
			<li data-target="#carousel-1" data-slide-to="2"></li>
			<li data-target="#carousel-1" data-slide-to="3"></li>
			<li data-target="#carousel-1" data-slide-to="4"></li>
			<li data-target="#carousel-1" data-slide-to="5"></li>
		</ol>
		<!--Contenedor de los Slie..-->
		<div class="carousel-inner" role="listbox">
		<!--Numero de item... imagenes..-->
			<div class="item active"> <!--AGREGUE ACTIVE PARA QUE SE ME VISUALICE EN LA PAGINA LAS IMAGENES..-->
				<img src="imagenes/logo_vanxer_3.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Pensamos en tu seguridad..</h3>
					<h5 class="hidden-lg hidden-md">Pensamos en tu seguridad..</h5>
				</div>
			</div>

			<div class="item">
				<img src="imagenes/urbe.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Transporte para URBE</h3>
					<h5 class="hidden-lg hidden-md">Transporte para URBE</h5>
				</div>
			</div>

			<div class="item">
				<img src="imagenes/urbe1.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">100% resposables y confiables</h3>
					<h5 class="hidden-lg hidden-md">100% resposables y confiables</h5>
				</div>
			</div>

			<div class="item">
				<img src="imagenes/Transporte2.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Pensamos en tu seguridad..</h3>
					<h5 class="hidden-lg hidden-md">Pensamos en tu seguridad..</h5>
				</div>
			</div>
			<div class="item">
				<img src="imagenes/Transporte1.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Transporte para URBE</h3>
					<h5 class="hidden-lg hidden-md">Transporte para URBE</h5>
				</div>
			</div>
			<div class="item">
				<img src="imagenes/mercado_vanxer.png" class="img-responsive">
				<div class="carousel-caption">
					<h3 class="hidden-xs hidden-sm">Realiza tus Pagos con MercadoPago</h3>
					<h5 class="hidden-lg hidden-md">Realiza tus Pagos con MercadoPago</h5>
				</div>
			</div>
		</div>
		<!--FLECHITAS PARA MOVER IMAGENES-->
		<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
		</a>

		<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Siguente</span>
		</a>

		</div>
		</div>
	</div>
    <br/><br/><br><br/>
   
	<section class="container"><center><img src="imagenes/Logo_vanxer2.png" class="img-responsive"></center></section>
	<!--*****************************|
          Seccion de Quienes Somos 
   *********************************|-->
	<a  id="quienes_somos" ></a>
	 <section class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="clearfix"></div>
                    <h3 class="section-heading" ><span class="glyphicon glyphicon-circle-arrow-right spa"></span> ¿Quienes Somos? </h3>
                    <hr class="section-heading-spacer">
                    <p class="lead" >Una <b>asociación de Transportistas</b> de Urbe que tiene como nombre Vanxer&copy<br>Vanxer planea una mejor forma de llevar a tus manos esta Aplicación web
                     , con la finalidad de automatizar el proceso administrativo tanto para el Transportista como para el Cliente.<br><br> Gracias a Vanxer podras llevar el control de la contabilidad de tus pagos, turnos, perfil, todo para ambos usuarios, como tambien podran interactuar facilmente el Transportista con el cliente.</p>
                </div>
                <br><br>
     <!--*****************************|
            Seccion de Servicios
     *********************************|-->
             <a  id="Servicios_mostrar" ></a>
             <aside class="col-lg-3 col-md-4 ">
                <h4><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Servicios!</h4>
                <hr class="section-heading-spacer">
                  <div class="list-group">
               	     <a href="#collapse1" data-toggle="collapse" class="list-group-item" >Cupo Diurno</a>
               	       <div id="collapse1" class="panel-in collapse "> <!--"escribo en la clase "collapse" es para q lo oculte-->
	                      <div class="panel-body ">
	    	               <p>Turno Diurno horario comprendido desde 6:40am a 11:10am
	    	               Turno Diurno horario comprendido desde 6:40am a 11:10am
	    	               Turno Diurno horario comprendido desde 6:40am a 11:10am
	    	               Turno Diurno horario comprendido desde 6:40am a 11:10am</p>
	                      </div>

	                   </div>
	                 <a href="#collapse2" data-toggle="collapse" class="list-group-item" >Cupo Vespertino</a>
	                    <div id="collapse2" class="panel-in collapse "> <!--"escribo en la clase "collapse" es para q lo oculte-->
	                      <div class="panel-body ">
	    	               <p>Turno Vespertino horario comprendido desde 12:00pm a 5:10pm
	    	               Turno Vespertino horario comprendido desde 12:00pm a 5:10pm
	    	               Turno Vespertino horario comprendido desde 12:00pm a 5:10pm
	    	               Turno Vespertino horario comprendido desde 12:00pm a 5:10pm
	    	               </p>
	                      </div>

	                   </div>
               	     <a href="#collapse3" data-toggle="collapse" class="list-group-item" >Cupo Nocturno</a>
               	        <div id="collapse3" class="panel-in collapse "> <!--"escribo en la clase "collapse" es para q lo oculte-->
	                      <div class="panel-body ">
	    	               <p>Turno Nocturno horario comprendido desde 5:00pm a 10:10pm
	    	               Turno Nocturno horario comprendido desde 5:00pm a 10:10pm
	    	               Turno Nocturno horario comprendido desde 5:00pm a 10:10pm
	    	               Turno Nocturno horario comprendido desde 5:00pm a 10:10pm
	    	               </p>
	                      </div>

	                   </div>
	              </div>
             </aside>
                  </div>

     </section>
     <section class="container-fluid">

            <div class="row">
            <center>
                <div class="col-lg-4  col-sm-6 col-xs-6">
                    <img src="imagenes/serv.png" class="img-responsive">
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <img src="imagenes/logo_urbe.png" class="img-responsive">
                </div>
				<div class="col-lg-4 col-sm-6 col-xs-6">
				    <img src="imagenes/transportista.jpg" class="img-responsive">
                </div>
            </center>
            </div>
      </section>

<!--*****************************|
     Seccion de Solicitar
*********************************|-->
			<a id="solicitar"></a>
			<section class="container-fluid" style="background-color:black;">
				<div class="row">
					<div class="col-lg-9 col-sm-9 ">
						<div class="clearfix"></div>
						<h3 class="section-heading" style="color:white;"><span style="color:white;" class="glyphicon glyphicon-circle-arrow-right spa"></span> ¿Como solicitar?<br></h3>
						<hr class="hr2">

						<p class="lead" style="color:white;">Si te gusta los servicios ofrecidos por nuestro sitio, y quieres formar parte a uno o varios de ellos
					  pues <b>FACIL!!</b> primero que todo debes elegir tu ubicación, la cual se desplegara una lista de Transportistas con su información, todo para tu comodida, luego llenar un formulario con tus datos y dirección exacta, junto con un comentario
						 al Transportista seleccionado</p>
						 <p class="lead" style="color:white;">Si te gusta los servicios ofrecidos por nuestro sitio, y quieres formar parte a uno o varios de ellos
					  pues <b>FACIL!!</b> primero que todo debes llenar un formulario con tus datos y dirección exacta, junto con un comentario
						 de parte del servicio a convenir...</p>
					</div>
					<div class="col-lg-3 col-sm-3">
						<center>
						<img src="imagenes/atencioncliente3.png" class="img-responsive"/>
						<br>
							<a href="solicitud_trans.php" class="btn btn-primary btn-lg btn-block">Solicite aqui!</a>
						</center>
						<br>
					</div>
				</div>
			</section>

<!--*****************************|
     Seccion de Pagos
*********************************|-->

         <a id="mostrar_pagos"></a>
			<section class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-sm-8 ">
						<div class="clearfix"></div>
						<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Pagos<br></h3>
						<hr class="section-heading-spacer">

						<p class="lead">Para disfrutar de los servicios por nuestro sitio, para ello debes realizar dicho <b>pago</b>
					     según lo estimado por el Facilitador</p>
					     <img src="imagenes/contrato.png" class="img-responsive"/>
					     <h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> ¿Porque segun lo estimado?</h3>
					     <hr class="section-heading-spacer">
						 <p class="lead">Ya que nosotros trabajamos por distintas <b>rutas</b> las cuales cada cliente dependiendo
						 lo distanciado que viva, se hara el calculo y se establecera el monto mensual <b>!</b> </p>
						 <br>
					</div>
					<div class="col-lg-4 col-sm-4">
					<br>
						<img src="imagenes/pagos_tar.png" class="img-responsive"/>
					</div>
				</div>
				<div class="row" style="background-color:black;">
						 <div class="col-lg-7 col-sm-8 ">
						 <div class="clearfix"></div>
						 <h3 class="section-heading" style="color:white;"><span style="color:white;" class="glyphicon glyphicon-circle-arrow-right spa"></span> ¿Como es el proceso de pago electronico ?</h3>
						 <hr class="hr2">
						 <p class="lead" style="color:white;">Facil! una vez de estar registrado en nuestro sitio y en dicho turno de estudio cancelaras entre los primeros 5 dias de cada mes.!<br><br>Adjuntando el codigo de referencia o la captura de el pago realizado, a tu transportista.</p>
						 </div>
						 <div class="col-lg-5 col-sm-4 col-xs-12">
						 	<img src="imagenes/transferenci.png" class="img-responsive">
						 </div>
				</div>
				<div class="row">
				<div class="container-fluid">
				<h3 class="section-heading"><span class="glyphicon glyphicon-circle-arrow-right spa"></span> Metodos de Pago</h3>
				<hr class="section-heading-spacer">
				</div>
				<br><br>
				<div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
				    <ul class="container" style="list-style:none;">
						 <li><img src="imagenes/mercadopago_logo.png" class="img-responsive"></li>
					</ul>
				  </div>
				  <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
				    <ul class="container" style="list-style:none;">
						 <li><img src="imagenes/bbva.png" class="img-responsive"></li>
					</ul>
				  </div>
				  <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
				    <ul class="container" style="list-style:none;">
						 <li><img src="imagenes/mercanntil.png" class="img-responsive"></li>
					</ul>
				  </div>
				  <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
				    <ul class="container" style="list-style:none;">
						 <li><img src="imagenes/banco_banesco.png" class="img-responsive"></li>
					</ul>
				  </div>
				</div>
			</section>
			<br><br>





<br><br>
<?php include("footer.php");?>
<!--***************************|
       REDES SOCIALES  
*****************************  |-->
<div class="social visible-lg visible-md">
<ul>
    <li><a href="https://www.facebook.com/" target="_blank" class="icon icon-facebook2"></a></li>
    <li><a href="https://www.instagram.com/marquina_abreu/" target="_blank" class="icon icon-instagram"></a></li>
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
