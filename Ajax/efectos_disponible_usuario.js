$(document).ready(function() {	
	$('#usuario_cli').blur(function(){ 
		
		$('#Info').html('<img src="imagenes/loader.gif" alt="" />').fadeOut(2500);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "chequeo_usuario.php",
            data: dataString,
            success: function(data) {
				$('#Info').slideDown(1500).html(data);
				//alert(data);
            }
        });
    });              
});    