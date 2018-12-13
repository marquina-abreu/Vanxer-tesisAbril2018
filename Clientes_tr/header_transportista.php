<?php
// session iniciada
@session_start();
$usuario_trans=$_SESSION['transportista'];
// si no fue iniciada que vaya a mamar

 
 $consulta_t= $conexion->prepare("SELECT id_transporte FROM transportistas INNER JOIN usuarios on usuarios.id_usuario=transportistas.id_usuario_trans WHERE usuarios.usuario=:usu_t");
 $consulta_t->execute(array(
	      ":usu_t"=>$usuario_trans));
 $resul_id_t=$consulta_t->fetch();

 $id_transportista= $resul_id_t["0"]; 

 
 $consul= $conexion->prepare("SELECT nombre_trans, foto_trans, apellido_trans, telefono_trans, usuarios.clave FROM transportistas INNER JOIN usuarios on usuarios.id_usuario=transportistas.id_usuario_trans WHERE usuarios.usuario=:usu_t");

 $consul->execute(array(
 	":usu_t"=>$usuario_trans));
 $datos=$consul->fetch();

if (!$_SESSION['transportista']) {
	if ($_SESSION["cliente"]) {
		header("Location: ../index_cliente.php");
	}
	else {
		header("Location: ../index.php");
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
				<a href="../index_transportista.php" class="navbar-brand"><img src="../imagenes/Logo_vanxer2_blanco.png" class="img-responsive" style="width:150px; height:30px;"></a>
			</div>
			<!--Iniciar Menu..-->
			<div class="collapse navbar-collapse" id=navegacion-trans>
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="../index_transportista.php">Inicio <span class="glyphicon glyphicon-home "></span></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gestionar<span class="caret">
					</span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a>Gestionar</a></li>
						<li class="divider"></li>
						<li><a href="../gestion_turno.php#turnoss">Turnos</a></li>
						<li><a href="index.php">Clientes</a></li>
					</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pagos <span class="glyphicon glyphicon-list-alt"></span> 
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a>Pagos</a></li>
						<li class="divider"></li>
						<li><a href="../pagos/realizados/">Pagos realizados</a></li>
						<li><a href="../pagos/pendientes/">Pagos Pendientes</a></li>
					</ul>
					</li>
					<li class="dropdown"><a href="../solictud_clientes.php">Solicitudes <span class="glyphicon glyphicon-envelope "></span></a></li>
				
				</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usuario_trans; ?> <span class="glyphicon glyphicon-user "></span>
							<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
						       <li id="solvente"><a href="#" class="btn btn-success">Conectado <span class="has-success glyphicon glyphicon-ok"></span></a></li>
						       <li class="divider"></li>
						       <li><a href="../perfil_transportista.php" >Perfil</a></li>
						       <li><a href="../logout.php" id="cerrar" >Cerrar Sesion <span class="glyphicon glyphicon-log-out"></span></a></li>
					       </ul>
						</li>
						</ul>

			</div>

		</div>

	</nav>
</header>
<div id="preloader">
    <div class="loader"></div>
  </div>