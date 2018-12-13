function eliminar_tur(id_tur,id_trans) {
        var xmlhttp;
        if (id_tur=="") {
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
            document.getElementById('volcar_confir').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","eliminar_turno.php?id_tur="+id_tur+"&id_trans="+id_trans,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }