function mostrar_info(id_cli) {
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
            
            document.getElementById('volcar_info_cli_edi').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","mostrar_info_cli.php?id_cli="+id_cli,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }