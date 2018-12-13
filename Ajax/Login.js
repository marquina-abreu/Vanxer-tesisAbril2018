$(document).ready(function(){
  $("#enviar_login").click(function(){
    $('#label_muestra').html('<img src="imagenes/loader.gif" alt="" />').fadeOut(700);
       $.ajax(
               {
              url : 'login.php',
              type: "POST",
              data : {email: $('#email').val(), contrasenna: $('#contrasenna').val()}
                })
                  .done(function(data) {
                      if(data){
                      $("#label_muestra").slideDown(1500).html(data); 

                        } 
                   })
               .fail(function(data) {
                  alert( "error" );
                      })
                   .always(function(data) {
                            
                      });

     });
});