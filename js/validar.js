
/***************************************************
V A L I D A C I O N  DE  F O R M  C O N  JQUERY
***************************************************/
$("#formulario_registro_cli").validate({ // <<< LIBRERIA JQUERY....
    rules: {


      usuario_cli:{
                required:true,
                minlength:4,
                maxlength:15,
               
            },

            contrasenna_cli: {

                    required: true,
                    minlength: 10

            },

            nombre_cli: {

                    required: true,
                    minlength: 2

            },

            apellido_cli:{
              required: true,
              minlength: 2
            },

            telefono_cli:{
                required: true,
                minlength: 11,
                maxlength: 11,
                number:true
            },

            correo_cli:{
              required:true,
              email:true
            }

    },
      messages: {

            usuario_cli: {
                    required: "Ingrese un usuario",
                    minlength: "Minimo 4 caracteres",
                    maxlength: "Maximo 15 caracteres"
                    },

            contrasenna_cli: {
                    required: "Ingrese una contraseña",
                    minlength: "Minimo 10 caracteres"
            },


            nombre_cli:{
              required:"Campo Obligatorio",
              minlength:"Minimo 2 caracteres"
            },

            apellido_cli:{
              required:"Campo Obligatorio",
              minlength:"Minimo 2 caracteres"
            },

            telefono_cli:{
              required:"Campo Obligatorio",
              minlength:"Ingrese 11 numeros",
              maxlength:"Ingrese 11 numeros",
              number:"Porfavor Ingrese solo numeros"
            },

            correo_cli:{
              required:"Ingrese un correo",
              email:"Ingrese un correo valido"
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
/********************************************
  VALIDACION PARA FORMULARIO DE TRANSPORTISTA
  ******************************************/
$("#formulario_trans").validate({ // <<< LIBRERIA JQUERY....
    rules: {


      usuario_trans:{
                required:true,
                minlength:4,
                maxlength:15,
               
            },

            contrasenna_trans: {

                    required: true,
                    minlength: 10

            },

            nombre_trans: {

                    required: true,
                    minlength: 2

            },

            apellido_trans:{
              required: true,
              minlength: 2
            },

            telefono_trans:{
                required: true,
                minlength: 11,
                maxlength: 11,
                number:true
            },

            correo_trans:{
              required:true,
              email:true
            },

            placa_trans:{
                required:true,
                maxlength:12
            },

            modelo_trans:{
                required:true,
                maxlength:20
            },
            anno_trans:{
                required:true,
                maxlength:4,
                number:true
            },
            cap_trans:{
                required:true,
                maxlength:2,
                number:true
            },
            clientid:{
                minlength:16,
                maxlength:16
            },
            clientsecret:{
                minlength:32,
                maxlength:32
            }

    },
      messages: {

            usuario_trans: {
                    required: "Ingrese un usuario",
                    minlength: "Minimo 4 caracteres",
                    maxlength: "Maximo 15 caracteres"
                    },

            contrasenna_trans: {
                    required: "Ingrese una contraseña",
                    minlength: "Minimo 10 caracteres"
            },


            nombre_trans:{
              required:"Campo Obligatorio",
              minlength:"Minimo 2 caracteres"
            },

            apellido_trans:{
              required:"Campo Obligatorio",
              minlength:"Minimo 2 caracteres"
            },

            telefono_trans:{
              required:"Campo Obligatorio",
              minlength:"Ingrese 11 numeros",
              maxlength:"Ingrese 11 numeros",
              number:"Porfavor Ingrese solo numeros"
            },

            correo_trans:{
              required:"Ingrese un correo",
              email:"Ingrese un correo valido"
            },
            placa_trans:{
                required:"Ingrese placa"
            },

            modelo_trans:{
                required:"Ingrese modelo de Vans"
            },

            anno_trans:{
                required:"Ingrese el año del auto",
                number:"Ingrese solo numeros"
            },

            cap_trans:{
                required:"Ingrese la Cantidad de Puestos",
                number:"Ingrese solo numeros"
            },
            clientid:{
                minlength:"Minimo de caracteres 16",
                maxlength:"Maximo de caracteres 16"
            },
            clientsecret:{
                minlength:"Minimo de caracteres 32",
                maxlength:"Maximo de caracteres 32"
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


//          FORMULARIO DE PAGOS MANUAL
$("#pago_manual").validate({ // <<< LIBRERIA JQUERY....
    rules: {
            nref:{
                required:true,
                number:true,
                minlength: 10,
                maxlength: 10
               
            },
            tpago: {

                    required: true,
                    minlength: 7,
                    maxlength: 20

            },
            detalles: {

                    required: true,
                    minlength: 9,
                    maxlength: 50

            }
            
    },
      messages: {

            nref: {
                    required: "Ingrese el n refencia",
                    number:"Porfavor Ingrese solo numeros",
                    minlength: "Minimo 10 caracteres",
                    maxlength: "Maximo 10 caracteres"
                    },

            tpago: {
                    required: "Ingrese un tipo de pago",
                    minlength: "Minimo 7 caracteres",
                    maxlength: "Maximo 20 caracteres"
            },


            detalles:{
              required:"Ingrese algunos detalles del pago",
              minlength:"Minimo 9 caracteres",
              maxlength: "Maximo 50 caracteres"
            },

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

// validacion de modulo de solicitudes al transportistas
$("#solic_trans").validate({ // <<< LIBRERIA JQUERY....
    rules: {


      nomb_tra:{
                required:true,
                minlength:3,
                maxlength:17
               
            },

            apellido: {

                    required: true,
                    minlength: 3,
                    maxlength:17


            },

            correo: {

                    required: true,
                    email:true,
                    minlength: 6,
                    maxlength: 40

            },

            telf:{
              required: true,
              number:true,
              minlength: 11,
              maxlength: 12

            },

            modelo:{
                required: true,
                minlength: 3,
                maxlength: 15
            },

            cantidad:{
              required:true,
              number:true,
              minlength: 2,
              maxlength: 2
            },

            comentario:{
                required:true,
                minlength: 7,
                maxlength:80
            },

            zona:{
                required:true,
                minlength: 5,
                maxlength:20
            }

    },
      messages: {

            nomb_tra:{
                required:"Ingrese su Nombre",
                minlength:"Minimo 3 caracteres",
                maxlength:"Maximo 17 caracteres"
               
            },

            apellido: {

                    required: "Ingrese su Apellido",
                    minlength: "Minimo 3 caracteres",
                    maxlength:"Maximo 17 caracteres"


            },

            correo: {

                    required: "Ingrese su Correo",
                    email:"Porfavor lo introducido no es un email",
                    minlength: "Minimo 6 Caracteres",
                    maxlength: "Maximo 40 caracteres"

            },

            telf:{
              required: "Ingrese su Telefono",
              number:"Solo números porfavor",
              minlength: "Minimo 12 números",
              maxlength: "Maximo 12 números"

            },

            modelo:{
                required: "Ingrese su Modelo de Van o vehículo",
                minlength: "Minimo 3 caracteres",
                maxlength: "Maximo 15 caracteres"
            },

            cantidad:{
              required:"Ingrese una cantidad",
              number:"Solo números porfavor",
              maxlength: "Minimo 2 digitos",
              minlength: "Maximo 2 digitos"
            },

            comentario:{
                required:"Ingrese un Comentario",
                minlength: "Minimo 7 caracteres",
                maxlength:"Maximo 80 caracteres"
            },

            zona:{
                required:"Ingrese una zona a Convenir",
                minlength: "Minimo 5 caracteres",
                maxlength:"Maximo 20 caracteres"
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

/*********************************************************
            VALIDANDO  CAMPOS DE TEXTO EVENTO ONKEYPRESS  |
*********************************************************/
function soloLetra(e) {
    key=e.keyCode || e.which;
    tecla=String.fromCharCode(key).toLowerCase();
    letras="áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-39-46";

    tecla_especial= false
    for(var i in especiales) {
        if(key == especiales) {
            tecla_especial=true;
            break;
        }
    }
    if (letras.indexOf(tecla)==-1 && !tecla_especial) {
        return false;
    }
}
/*********************************************************
            VALIDANDO  CAMPOS DE CONTRASEÑA              |
*********************************************************/
$('#clave , #clave2').focusin(function(){
        $('.estilo2').removeClass( 'has-success has-warning has-error' );
        $('.icono2').removeClass( 'glyphicon-ok glyphicon-warning-sign glyphicon-remove' );
        $('.mensaje').html('');
        $('.mensaje').removeClass( 'help-block' );     
    });

$('#clave , #clave2').focusout(function(){
        if( formulario.clave.value === '' || formulario.clave2.value === '' )
        {
            $('.estilo2').removeClass( 'has-success has-error' );
            $('.estilo2').addClass( 'has-warning has-feedback' );
            $('.icono2').removeClass( 'glyphicon-ok glyphicon-remove' );
            $('.icono2').addClass( 'glyphicon-warning-sign' );
            $('.mensaje').addClass( 'help-block' );
            $('.mensaje').html('Campo Requerido');
            co = 1;
        }
        else
        {
            if ( formulario.clave.value != formulario.clave2.value )
            {
                $('.estilo2').removeClass( 'has-success has-warning' );
                $('.estilo2').addClass( 'has-error has-feedback' );
                $('.icono2').removeClass( 'glyphicon-ok glyphicon-warning-sign' );
                $('.icono2').addClass( 'glyphicon-remove' );
                
                $('.mensaje').html('Las claves NO coinciden');
                errorClave = 1; 
            }
            else
            {
                $('.estilo2').removeClass( 'has-warning has-error' );
                $('.estilo2').addClass( 'has-success' );
                $('.icono2').removeClass( 'glyphicon-warning-sign glyphicon-remove' );
                $('.icono2').addClass( 'glyphicon-ok' );
                $('.mensaje').html('');
                $('.mensaje').removeClass( 'help-block' );
                co = 0;
                errorClave = 0;
            }
        }
    });
 
var Ayuda = {
	Nombre : "Moises",
	Apellido : "Marquina",
	Correo : "tucorreo@???.com",
	Contrasena : "12345asdW",
	Edad : "18",
	mostrarAyuda : function(){
		alert( 'Nombre '+ this.Nombre +'\nApellido: ' + this.Apellido + '\nCorreo: ' + this.Correo + '\nContraseña: ' + this.Contrasena +'\nEdad: ' + this.Edad );
	}
}

