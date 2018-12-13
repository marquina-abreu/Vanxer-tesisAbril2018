$(document).ready(function(){
  $("#enviar_login").click(function(){

       $.ajax(
               {
              url : 'login.php',
              type: "POST",
              data : {email: $('#email').val(), contrasenna: $('#contrasenna').val()}
                })
                  .done(function(data) {
                      if(data){
                      $("#exampleModalLabel").html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});