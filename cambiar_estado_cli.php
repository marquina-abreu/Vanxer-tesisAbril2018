<?php
include_once("pdo_conexion.php");

$id_cli=$_GET["id_cli"];
$id_t=$_GET["id_t"];
$id_tur=$_GET["id_tur"];


$consul_turnos_cli= $conexion->prepare("SELECT clientes.* FROM clientes INNER JOIN cliente_turno on clientes.id_cliente=cliente_turno.cliente WHERE clientes.id_trans_cli=:id_trans_cli AND cliente_turno.turno_cli=:id_turno_cli");
$consul_turnos_cli->execute(array(
	":id_trans_cli"=>$id_t,
	":id_turno_cli"=>$id_tur));
$resultado_cli= $consul_turnos_cli->fetchAll();


$sql=$conexion->prepare("SELECT estado FROM clientes WHERE id_cliente=:id_cli");
$sql->execute(array(":id_cli"=>$id_cli));
$resul_esta= $sql->fetch();
$resul_esta=$resul_esta["0"];


if ($resul_esta==1) { 
          
  $esta_boleean=0;
  $upda= $conexion->prepare("UPDATE clientes SET estado =:estado WHERE id_cliente=:id_c");
  $upda->execute(array(":estado"=>$esta_boleean,":id_c"=>$id_cli));

  				echo "<ul>";
  foreach ($resultado_cli as $cliente):
  	$sql=$conexion->prepare("SELECT estado FROM clientes WHERE id_cliente=:id_cli");
                      $sql->execute(array(":id_cli"=>$cliente['id_cliente']));
                      $resul_esta= $sql->fetch();
                      $resul_esta=$resul_esta["0"];
                      $estado_="";
                      if ($resul_esta==1) {
                        $estado_.="Deshabilitar";
                      }else{
                        $estado_.="Habilitar";
                      }

  				echo "<li>";
                       echo"<p>".$cliente['nombre_cli']."".'  '."".$cliente["apellido_cli"]."</p>";
                       echo '<a href="#visualizar_cli" data-toggle="modal" class="btn btn-primary" id="'.$cliente["id_cliente"].'" onclick="mostrar_info(this.id)">Ver</a>&nbsp;';
                       echo '<a href="#confirm_ex_turno" data-toggle="modal" id="'.$cliente["id_cliente"].'" class="btn btn-warning" onclick="expulsar(this.id,'.$id_tur.')">Expulsar</a>&nbsp;';
                        
                       echo'<button class="btn btn-default" value="'.$cliente["id_cliente"].'" onclick="cambiar(this.value,'.$id_t.','.$id_tur.')">'.$estado_.'</button>';
                 echo'</li>';
                       endforeach;
                 echo "</ul>";
        
}else{
          
  $esta_boleean=1;
  $upda= $conexion->prepare("UPDATE clientes SET estado =:estado WHERE id_cliente=:id_c");
  $upda->execute(array(":estado"=>$esta_boleean,":id_c"=>$id_cli));

  				echo "<ul>";
  foreach ($resultado_cli as $cliente):

  					  $sql->execute(array(":id_cli"=>$cliente['id_cliente']));
                      $resul_esta= $sql->fetch();
                      $resul_esta=$resul_esta["0"];
                      $estado_="";
                      if ($resul_esta==1) {
                        $estado_.="Deshabilitar";
                      }else{
                        $estado_.="Habilitar";
                      }
  				echo "<li>";
                       echo"<p>".$cliente['nombre_cli']."".'  '."".$cliente["apellido_cli"]."</p>";
                       echo '<a href="#visualizar_cli" data-toggle="modal" class="btn btn-primary" id="'.$cliente["id_cliente"].'" onclick="mostrar_info(this.id)">Ver</a>&nbsp;';
                       echo '<a href="#confirm_ex_turno" data-toggle="modal" id="'.$cliente["id_cliente"].'" class="btn btn-warning" onclick="expulsar(this.id,'.$id_tur.')">Expulsar</a>&nbsp;';
                        
                       echo'<button class="btn btn-default" value="'.$cliente["id_cliente"].'" onclick="cambiar(this.value,'.$id_t.','.$id_tur.')">'.$estado_.'</button>';
                 echo'</li>';
                       endforeach;
                 echo "</ul>";
}


?>