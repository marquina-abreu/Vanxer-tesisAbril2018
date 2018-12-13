$(document).ready(function(){
  $("#hecho").click(function(){

        
       $.ajax(
               {
              url : 'pagar/registro_pago.php',
              type: "POST",
              data : {
              	   		nref: $('#nref').val(),
                     	tpago: $('#tpago').val(),
                     	detalles: $('#detalles').val(),
                      idcli: $('#idcli').val(),
                      idtur: $('#idtur').val(),
                     	idtra: $('#idtra').val()}
                })
     
                  .done(function(data) {
                      if(data){
                      $("#result").html(data); 

                        } 
                   })
               .fail(function(data) {
                  
                      })
                   .always(function(data) {
                            
                      });

     });
});