$(document).ready(function(){
  $("#aplicar").click(function(){
       $.ajax(
               {
              url : 'aplicar_cambios_crud.php',
              type: "POST",
              data : {
              	   		nombre_edi: $('#nombre_edi').val(),
                     	apellido_edi: $('#apellido_edi').val(),
                     	correo_edi: $('#correo_edi').val(),
                     	telefono_edi: $('#telefono_edi').val(),
                     	id_cli_edi: $('#id_cli_edi').val()}
                })
                  .done(function(data) {
                      if(data){
                      $("#volcar_info_cli_edi").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});