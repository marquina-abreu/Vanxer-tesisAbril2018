$(document).ready(function(){
  $("#comentar").click(function(){
       $.ajax(
               {
              url : 'comentar_noti.php',
              type: "POST",
              data : { 
                      usua: $('#usua').val(), 
                      asunto: $('#asunto').val(),
                      comentario: $('#comentario').val(),
                      id_noti: $('#id_noti').val()
                      }
                })
                  .done(function(data) {
                      if(data){
                      $("#mostrar_comentarios").html(data); 
                      $("#asunto").val("").html();
                      $("#comentario").val("").html();

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});