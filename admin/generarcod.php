<?php 

function rand_code($chars, $long){
$code = "";
for ($x=0; $x <= $long; $x++)
{
$rand = rand(1, strlen($chars));
$code .= substr($chars, $rand, 1);
}
return $code;
}

$caracteres = "0123456789abcdefghijkmnopqrstuvfABCDEFZXT$";
$longitud = 9;

$codi="AD".rand_code($caracteres, $longitud);
echo "<input type='text' name='codi' id='codi' class='form-control' style='width:70%; display:inline-block;' readonly='' value='".$codi."'>";


?>
