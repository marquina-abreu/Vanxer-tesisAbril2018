<?php
error_reporting(E_ERROR | E_PARSE);
// session iniciada
@session_start();
$nombre_usuario=$_SESSION['cliente'];
// si no fue iniciada que vaya a mamar


 $consulta_t= $conexion->prepare("SELECT id_trans_cli FROM clientes INNER JOIN usuarios on usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu_t");
 $consulta_t->execute(array(
	      ":usu_t"=>$nombre_usuario));
 $resul_id_t=$consulta_t->fetch();

 $id_transportista= $resul_id_t["0"]; 
 
 $consul= $conexion->prepare("SELECT id_cliente,nombre_cli, apellido_cli, telefono,id_cod_ver, fecha_registro, imagen_cli, usuarios.clave FROM clientes INNER JOIN usuarios on usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu_t");

 $consul->execute(array(
 	":usu_t"=>$nombre_usuario));
 $datos=$consul->fetch();

 
$sql=$conexion->prepare("SELECT estado FROM clientes INNER JOIN usuarios ON usuarios.id_usuario=clientes.id_usuario_cli WHERE usuarios.usuario=:usu_traido");
$sql->execute(array(":usu_traido"=>$nombre_usuario));
$resul_state=$sql->fetch();
$resul_state=$resul_state["0"];

if (!$_SESSION['cliente']) {
	if ($_SESSION["transportista"]) {
		header("Location:../index_transportista.php");
	}
	else {
	header("Location:../index.php");
}
}

?>
<?php if ($resul_state==1) {
$estado='<a class="btn btn-success">Solvente <span class="has-success glyphicon glyphicon-ok"></span></a>';
echo '<header>';
	echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
		echo '<div class="container">';
			echo '<div class="navbar-header">';
				echo '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-trans">
					<span class="sr-only">Menu Transporte</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>';
				echo '<a href="index.php" class="navbar-brand"><img src="../imagenes/Logo_vanxer2_blanco.png" class="img-responsive" style="width:150px; height:30px;"></a>';
			echo '</div>';
			
			echo '<div class="collapse navbar-collapse" id=navegacion-trans>';
				echo '<ul class="nav navbar-nav">';
					echo '<li class="dropdown"><a href="index.php#Noticias">Noticias <span class="glyphicon glyphicon-info-sign"></span></a></li>';
					echo '<li class="dropdown"><a href="turnos.php">Turnos <span class="glyphicon glyphicon-list-alt"></span> </a></li>';
					echo '<li class="dropdown"><a href="gestionpagos/">Gestion de Pagos <span class="glyphicon glyphicon-briefcase  "></span></a></li>';
					

				echo '</ul>';
					echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li class="dropdown">';
							echo " <a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>".$nombre_usuario."</b>
							 <span class='glyphicon glyphicon-user'></span>
							 <span class='caret'></span></a>";
							echo "<ul class='dropdown-menu' role='menu'>";
						       echo '<li id="solvente">'.$estado.'</li>';
						       echo '<li class="divider"></li>';
						       echo '<li><a href="cliente_editar_perfil.php" >Perfil</a></li>';
						       echo '<li><a href="../logout.php" id="cerrar" >Cerrar Sesion <span class="glyphicon glyphicon-log-out"></span></a></li>';
					       echo '</ul>';
						echo '</li>';
						echo '</ul>';

			echo '</div>';

		echo '</div>';

	echo '</nav>';
echo '</header>';
}
else { 
$estado='<a class="btn btn-warning">Insolvente <span class="has-success glyphicon glyphicon-remove"></span></a>';
	echo '<header>';
	echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
		echo '<div class="container">';
			echo '<div class="navbar-header">';
				echo '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-trans">
					<span class="sr-only">Menu Transporte</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>';
				echo '<a href="index.php" class="navbar-brand"><img src="../imagenes/Logo_vanxer2_blanco.png" class="img-responsive" style="width:150px; height:30px;"></a>';
			echo '</div>';
			
			echo '<div class="collapse navbar-collapse" id=navegacion-trans>';
				echo '<ul class="nav navbar-nav">';
					
					echo '<li class="dropdown"><a href="gestionpagos/">Gestion de Pagos <span class="glyphicon glyphicon-briefcase  "></span></a></li>';

				echo '</ul>';
					echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li class="dropdown">';
							echo " <a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>".$nombre_usuario."</b>
							 <span class='glyphicon glyphicon-user'></span>
							 <span class='caret'></span></a>";
							echo "<ul class='dropdown-menu' role='menu'>";
						       echo '<li id="insolvente">'.$estado.'</li>';
						       echo '<li class="divider"></li>';
						       echo '<li><a href="cliente_editar_perfil.php" >Perfil</a></li>';
						       echo '<li><a href="../logout.php" id="cerrar" >Cerrar Sesion <span class="glyphicon glyphicon-log-out"></span></a></li>';
					       echo '</ul>';
						echo '</li>';
						echo '</ul>';

			echo '</div>';

		echo '</div>';

	echo '</nav>';
echo '</header>';
}
?>
<div id="preloader">
    <div class="loader"></div>
  </div>
