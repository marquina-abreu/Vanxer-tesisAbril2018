
var resultado = document.getElementById('info');

function mostrarClientes() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();

	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200)  {
			// Me Traigo los resultados de la DB..
			resultado.innerHTML = xmlhttp.responseText; 
		}
	}
	
	xmlhttp.open("GET","servidor.php?clientes="+"clientes",true);
	xmlhttp.send(); // PETICION DE AJAX.. 	
}

mostrarClientes();

function editarClientes(usuarioID) {
	var usuario_ID = "usuario_ID" + usuarioID;
	var nombre_ID = "nombre_ID" + usuarioID;
	var apellido_ID = "apellido_ID" + usuarioID;
	var correo_ID = "correo_ID" + usuarioID;
	var borrar = "borrar" + usuarioID;
	var actualizar = "actualizar" + usuarioID;

	var editarNombre_ID = nombre_ID + "-editar";

	var nombreDelUsuario =document.getElementById(nombre_ID).innerHTML; 

	var parent =document.querySelector("#" + nombre_ID);

	if (parent.querySelector("#"+ editarNombre_ID)=== null) {
	 document.getElementById(nombre_ID).innerHTML = "<input type ='text' class= 'form-control' id='"+editarNombre_ID+"' value='"+nombreDelUsuario+"'>";
	 document.getElementById(borrar).disabled = "true"; 
	 document.getElementById(actualizar).style.display = "block";

	}


}

function actualizarCliente(usuarioID) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();

	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var nombreActualizado = document.getElementById("nombre_ID"+ usuarioID + "-editar").value ; /*tomo y evaluo lo nuevo q
	se escribio */
	xmlhttp.onreadystatechange = function(){ // PETICION AJAX..
		if (this.readyState === 4 && this.status === 200) /*Peticion ha sido Finalizada y exitosa..*/ {
			// Me Traigo los resultados de la DB una vez actualizados..
			mostrarClientes();
		}
	}
	xmlhttp.open("GET","servidor.php?usuarioIDActualizado="+ usuarioID + "&nombreActualizado=" + nombreActualizado,true);
	xmlhttp.send(); // peticion enviada..


}


