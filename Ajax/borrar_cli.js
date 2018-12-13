function borrar_cli(id_cli) {
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
            
            document.getElementById('volcar_id').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","borrar_cli.php?id_cli="+id_cli,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }