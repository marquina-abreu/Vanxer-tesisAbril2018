function info_turno(id_tur,idtrans) {
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
            document.getElementById('infotur').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","info_turno_trans.php?id_tur="+id_tur+"&idtrans="+idtrans,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }