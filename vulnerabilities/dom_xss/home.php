

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Secuencias de Comandos en Sitios Cruzados (XSS)  - DOM</a></h3>
        
        <p align="justify">
        XSS basado DOM también conocido como "type-0 XSS" es una clase de contraste especial en la categoría Cross Site Scripting en la que se ejecuta el script malicioso 
        como resultado de alterar los objetos del entorno DOM. El ataque se dispara dentro de la página, pero sin necesidad de solicitudes de respuestas HTTP. </p><br><br>
        <p>Leer más de DOM Based XSS <br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/DOM_Based_XSS ">https://www.owasp.org/index.php/DOM_Based_XSS </a></p>
        <a target="_blank" href="https://diego.com.es/ataques-xss-cross-site-scripting-en-php ">https://diego.com.es/ataques-xss-cross-site-scripting-en-php</a></p>
	<a target="_blank" https://thehackerway.com/2011/05/23/explotando-vulnerabilidades-xss-en-aplicaciones-web/ ">https://thehackerway.com/2011/05/23/explotando-vulnerabilidades-xss-en-aplicaciones-web/ </a></p>
        <a target="_blank" href="https://www.owasp.org/index.php/DOM_based_XSS_Prevention_Cheat_Sheet">https://www.owasp.org/index.php/DOM_based_XSS_Prevention_Cheat_Sheet </a></p>
    </div>

</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>  
            <form method='get' action=''>
                <div class="form-group"> 
                    <label></label>
                    Selecciona tu Lenguaje:<br>
                    <select class="form-control"><script>
                        var i = document.location.href.substring(document.location.href.indexOf("default="));
                        if(i.indexOf("default") > -1){
                            document.write("<OPTION value=1>"+document.location.href.substring(document.location.href.indexOf("default=")+8)+"</OPTION>");
                        }
                        document.write("<OPTION value=2>Inglés</OPTION>");
                        document.write("<OPTION value=3>Frances</OPTION>");
                        document.write("<OPTION value=4>Alemán</OPTION>");
                        document.write("<OPTION value=5>Español</OPTION>");
                    </script></select>
                    <hr>
                    Buscar en la página <br>
                    <input class="form-control" width="50%" placeholder="Ingresa el item a buscar" name="search"></input> <br>
                    <div align="right"> <button class="btn btn-default" type="submit" onclick="search()">Buscar</button></div>
                
                </div> 
            </form>
            
            
            </p>
            <p id="srch"></p>
    </div>
      
    <hr>
    
</div>
<?php include_once('../../about.html'); ?>