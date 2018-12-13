function edit_zona(id_zona) {
        var xmlhttp;
        if (id_zona=="") {
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
            
            document.getElementById('volcar_info_zona').innerHTML = xmlhttp.responseText; 

        }
      }
    xmlhttp.open("GET","editar_zona.php?id_zona="+id_zona,true);
    xmlhttp.send(); // PETICION DE AJAX..   
    }