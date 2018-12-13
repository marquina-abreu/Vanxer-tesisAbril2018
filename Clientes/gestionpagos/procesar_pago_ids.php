<?php
include_once("../../pdo_conexion.php");
include_once("../../mercadopago/lib/mercadopago.php");


$id_turno= $_GET["idtur"]; 
$id_trans= $_GET["idtra"];
$idcli= $_GET["idcli"];


$sql=$conexion->query("SELECT costo FROM trans_turno WHERE transportista=$id_trans AND turno=$id_turno");
$result=$sql->fetch();
$costo=$result["costo"];

$h=(float)$costo;
//Buscar las credenciales
$sql2=$conexion->query("SELECT client_id, client_secret FROM transportistas WHERE id_transporte=$id_trans");
$credencials=$sql2->fetch();

$mp = new MP($credencials["client_id"],$credencials["client_secret"]);


$preference_data = array(
    "items" => array(
        array(
            "title" => "Cuota mensual Vanxer",
            "currency_id" => "VEF",
            "category_id" => "Cuota",
            "quantity" => 1,
            "unit_price" =>$h
        )
    ),
    "back_urls" => array(
		"success" => "localhost/transporte/Clientes/gestionpagos/exitoso/",
		"failure" => "localhost/transporte/Clientes/gestionpagos/",
		"pending" => "http://www.pending.com"
	),
	"auto_return" => "approved",
    "payment_methods" => array( 
        "excluded_payment_types" => array( 
            array( "id"=>"ticket"), 
            array("id"=>"bank_transfer")  )       
 
     )
);

$preference = $mp->create_preference($preference_data);

  
    if ($preference) {
       
        echo "<input type='hidden' value='".$id_turno."' id='idtur'>";
         echo "<center>";
            echo "<h4>Elija pagar con:</h4>";
            echo "<img src='../../imagenes/mercadopago_logo.png' class='img-responsive'>";
            echo @"<a href='".$preference['response']['init_point']."' name='MP-Checkout' class='btn btn-info btn-block'>Procesar Pago</a>";
         echo "</center>";
        }else{
        echo "<center>";
            echo "<h4 class='alert alert-danger'>No se establecio conexión con MercadoPago o hubo un Error.</h4>";
        echo "</center>";
        }
                
   
    


?>