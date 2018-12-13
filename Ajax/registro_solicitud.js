$(document).ready(function(){
  $("#enviar_solic").click(function(){
 
       $.ajax(
               {
              url : 'registro_solicitud.php',
              type: "POST",
              data : {
              	   		nombre_visi: $('#nombre_cli').val(),
                     	apellido_visi: $('#apellido_cli').val(),
                     	telefono_visi: $('#telefono_cli').val(),
                      correo: $('#correo_cli').val(),
                     	coment_visi: $('#coment_visi').val(),
                     	vanero_: $('#vanero_').val()}
                })
            
                  .done(function(data) {
                      if(data){
                      $("#hechoo").html(data); 

                        } 
                   })
               .fail(function(data) {
                  
                      })
                   .always(function(data) {
                            
                      });
     });
});