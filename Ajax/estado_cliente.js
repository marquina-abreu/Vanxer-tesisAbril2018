function cambiar(id_cli,id_t,id_tur) {
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
            document.getElementById('cambiar_estado').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","cambiar_estado_cli.php?id_cli="+id_cli+"&id_t="+id_t+"&id_tur="+id_tur,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }