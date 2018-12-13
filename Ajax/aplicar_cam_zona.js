$(document).ready(function(){
  $("#aplicar_zo").click(function(){
       $.ajax(
               {
              url : 'aplicar_cambios_zona.php',
              type: "POST",
              data : {
              	   		nombre_zona: $('#nombre_zoid').val(),
                     	direcc_zona: $('#des_id').val(),
                     	parroquia: $('#parr_id').val(),
                     	id_zona: $('#id_zona_traida').val()}
                })
                  .done(function(data) {
                      if(data){
                      $("#volcar_info_zona").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});