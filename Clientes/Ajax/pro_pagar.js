function pro_pagar(id_tur,idtrans,idcli) {
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
            
            document.getElementById('vol_ids').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","procesar_pago_ids.php?idtur="+id_tur+"&idtra="+idtrans+"&idcli="+idcli,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }