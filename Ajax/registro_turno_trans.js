$(document).ready(function(){
  $("#registrar_turno").click(function(){
       $.ajax(
               {
              url : 'registro_turno.php',
              type: "POST",
              data : {turno_id: $('#turno_id').val(), 
                      id_transporte_turno: $('#id_transporte_turno').val(), 
                      costo: $('#costo').val(),
                      dia_pag: $('#dia_pag').val()}
                })
                  .done(function(data) {
                      if(data){
                      $("#muestra").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});