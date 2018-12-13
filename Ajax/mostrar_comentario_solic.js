function mostrar_coment(id_cli) {
    var xmlhttp;
    if (id_cli=="") {
        document.getElementById('txtHint').innerHTML="";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
    if (this.readyState === 4 && this.status === 200)  {
        // Me Traigo los resultados de la DB..
        document.getElementById('volcar_comentario').innerHTML = xmlhttp.responseText; 

    }
  }
xmlhttp.open("GET","info_comentario_solic.php?id_cli="+id_cli,true);
xmlhttp.send(); // PETICION DE AJAX..   
}