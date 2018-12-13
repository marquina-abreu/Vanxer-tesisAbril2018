$(document).ready(function(){
  $("#crear_c").click(function(){
       $.ajax(
               {
              url : 'registro_codi_verf.php',
              type: "POST",
              data : {
                      codi: $('#codi').val(),
                      idsoli: $('#idsoli').val(),
                      trans: $('#trans').val()

                     }
                })
                  .done(function(data) {
                      if(data){
                      $("#resp").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});