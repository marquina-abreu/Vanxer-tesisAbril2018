$(window).on('load', function() { // makes sure the whole site is loaded 
  $('.loader').fadeOut(1200); // will first fade out the loading animation 
  $('#preloader').delay(1240).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(1240).css({'overflow':'visible'});
})


 $(document).ready(function(){
         $("#MensagePrincipalUser").fadeOut("fast");
        $("#MensagePrincipalUser").fadeIn("slow");
    
});


//FORMULARIO MODIFICAR
 
$(document).ready(function(){
    $("#FormularioModificar").validate({    
    rules: {
            NumCasa: {
                 required: true,
                  minlength: 1,
                  maxlength: 255,
                  min: 1,
                  max: 255,
                  number: true
                  
                      },
            CampoElemento: {
            			required: true

            }, 


            CampoValor: {
            	required: true,

            }

    },
      messages: {

            NumCasa: {
                    required: "CAMPO REQUERIDO",
                    minlength: "RANGO (1-255)",
                    maxlength: "Rango (1-255)",
                    min: "RANGO (1-255)",
                    max: "RANGO (1-255)",
                    number: "PROHIBIDO INGRESAR LETRAS"
                    },
            CampoElemento: {
            		required: "Campo Requerido"
            },

            CampoValor: {
            	required: "Campo Requerido"
            }


        },

    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
    },
    errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.length) {
                error.insertAfter(element);
            } else {
            error.insertAfter(element);
            }
        } 
 });
   
});


//FORMULARIO BORRAR


$(document).ready(function(){
    $("#FormularioBorrar").validate({    
    rules: {
            CampoBorrar: {
                 required: true,
                  minlength: 1,
                  maxlength: 255,
                  min: 1,
                  max: 255
                 

                  
                      }
    },
      messages: {

            CampoBorrar: {
                    required: "Campo Requerido",
                    minlength: "Rango (1-255)",
                    maxlength: "Rango (1-255)",
                    min: "Rango (1-255)",
                    max: "Rango (1-255)"
                   

                    }
           

        },

    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
    },
    errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.length) {
                error.insertAfter(element);
            } else {
            error.insertAfter(element);
            }
        } 
 });
   
});


//FORMULARIO BUSCAR

$(document).ready(function(){
    $("#FormularioBuscar").validate({    
    rules: {
            Buscar: {
                 required: true,
                  minlength: 1,
                  maxlength: 255,
                  min: 1,
                  max: 255
                 

                  
                      },
            CampoElemento2: {
                    required: true
                    
            }
    },
      messages: {

            Buscar: {
                    required: "Campo Requerido",
                    },
            CampoElemento2:{
                    required: "Campo requerido"
            }
           

        },

    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.FormCaja').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
    },
    errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.length) {
                error.insertAfter(element);
            } else {
            error.insertAfter(element);
            }
        } 
 });
   
});

//FORMULARIO DE PAGO VIA TRANSFERENCIA



$(document).ready(function(){
    $("#FormPagoTransferencia").validate({    
    rules: {
            Referencia: {
                 required: true,
                 number: true
                  
                      },
            MontoTransferido: {
                    required: true,
                    number: true
                    
            },

            Banco: {

                required: true,
            },
            Mes: {
                required: true
            }
    },
      messages: {

            Referencia: {
                    required: "Campo Requerido",
                    number: "INGRESE UNICAMENTE NUMEROS"
                    },
            MontoTransferido:{
                    required: "Campo requerido",
                    number: "Solo numeros"
            },
            Mes: {
                required: "Campo requerido"
            }
           

        },

    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');  
        
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');  
        
    },
    errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.length) {
                error.insertAfter(element);
            } else {
            error.insertAfter(element);
            }
        } 
 });
   
});



//FORMULARIO MENSAJE





