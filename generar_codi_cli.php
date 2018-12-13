<?php 
require_once("pdo_conexion.php");

$codi=$_POST["codi"];

$sql=$conexion->query("SELECT nombre_trans FROM transportistas WHERE id_transporte=$codi");
$res=$sql->fetch();
$nomb=$res["nombre_trans"];

//iniciales
$ini=strtoupper(substr($nomb,0,3));

function rand_code($chars, $long){
$code = "";
for ($x=0; $x <= $long; $x++)
{
$rand = rand(1, strlen($chars));
$code .= substr($chars, $rand, 1);
}
return $code;
}

$caracteres = "0123456789abcdefghijkmnopqrstuvfABCDEFZXT$#&@";
$longitud = 8;
echo "<input type='text' name='codi' id='codi' class='form-control' style='width:80%; display:inline-block;' readonly='readonly' value='".$ini.rand_code($caracteres, $longitud)."'>";


?>
