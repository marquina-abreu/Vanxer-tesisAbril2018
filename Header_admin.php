<?php
// session iniciada
@session_start();
$_SESSION['admin'];


if (!$_SESSION['admin']) {
	if ($_SESSION["cliente"]) {
		header("Location: index_cliente.php");
	}
	else {
		header("Location: index.php");
	}
}


?>

<header>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header"><!--Aqui agrego el menu movil...-->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-trans">
					<span class="sr-only">Menu Transporte</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index_admin.php" class="navbar-brand"><img src="imagenes/Logo_vanxer2_blanco.png" class="img-responsive" style="width:150px; height:30px;"></a>
			</div>
			<!--Iniciar Menu..-->
			<div class="collapse navbar-collapse" id=navegacion-trans>
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="index_admin.php">Inicio <span class="glyphicon glyphicon-home "></span></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Administrar<span class="caret">
					</span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="Categorias_admin.php">Administrar</a></li>
						<li class="divider"></li>
						<li><a href="#">Transportistas</a></li>
						<li><a href="#clientes_mostrar">Clientes</a></li>
					</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Bandejas <span class="glyphicon glyphicon-list-alt"></span> 
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Bandejas</a></li>
						<li class="divider"></li>
						<li><a href="#">Pagos realizados</a></li>
						<li><a href="#">Pagos Pendientes</a></li>
					</ul>
					</li>
					<li class="dropdown"><a href="#">Solicitudes <span class="glyphicon glyphicon-envelope "></span></a></li>
				
				</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="glyphicon glyphicon-user "></span>
							<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
						       <li id="conectadoo"><a href="#" class="btn btn-success">Conectado <span class="has-success glyphicon glyphicon-ok"></span></a></li>
						       <li class="divider"></li>
						       <a href="#" class="btn btn-primary btn-block">Perfil</a><br>
						       <a href="logout.php" id="cerrar" class="btn btn-warning btn-block">Cerrar Sesion <span class="glyphicon glyphicon-log-out"></span></a>
					       </ul>
						</li>
						</ul>

			</div>

		</div>

	</nav>
</header>