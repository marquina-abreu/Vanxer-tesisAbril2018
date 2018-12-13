function expulsar(id_cli,turno) {
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
        if (this.readyState === 4 && this.status === 200){
            // Me Traigo los resultados de la DB..
            document.getElementById('volcar_').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","expulsar_cli_tur.php?id_cli="+id_cli+"&id_tur="+turno,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }