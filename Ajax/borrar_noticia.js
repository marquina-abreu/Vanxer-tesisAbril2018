function borrar_noti(id_noti) {
        var xmlhttp;
        if (id_noti=="") {
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
           
            document.getElementById('volcar_noticia').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","borrar_noticia.php?id_noti="+id_noti,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }