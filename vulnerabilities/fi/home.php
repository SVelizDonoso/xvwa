 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Inclusión de Archivos</a></h3>
        
        <p align="justify">
        La inclusión de archivos es un ataque que permitiría a un atacante acceder a archivos no deseados en el servidor. Esta vulnerabilidad explota la funcionalidad de la aplicación para incluir archivos dinámicos. Dos categorías en este ataque son Inclusión de archivos locales (LFI) e Inclusión de archivos remotos (RFI). 
        </p><br><br>
        <p>Leer más de Inclusión de archivos<br><br>
	<a target="_blank" https://www.welivesecurity.com/la-es/2015/01/12/como-funciona-vulnerabilidad-local-file-inclusion/">https://www.welivesecurity.com/la-es/2015/01/12/como-funciona-vulnerabilidad-local-file-inclusion/</a>
        <a target="_blank" href="https://www.owasp.org/index.php/Testing_for_Local_File_Inclusion">https://www.owasp.org/index.php/Testing_for_Local_File_Inclusion</a>
        <a target="_blank" href="https://www.owasp.org/index.php/Testing_for_Remote_File_Inclusion">https://www.owasp.org/index.php/Testing_for_Remote_File_Inclusion</a>
	
        </p>

    </div>

</div>

<div class="well">

    <p>
        <form method="get" action="">
            <div class="form-group">
                <br>
                <div class="text-left">
                <?php 
                    $f='readme.txt';
                    echo "<a class=\"btn btn-primary\" href=\".?file=$f\" /> Haga click aquí </a><br><br>";

                    if($file=$_GET['file']){
                        include($file);
                    }                    
                ?>
                </div>
            </div>
        </form>
    </p>

      
    <hr>
    
</div>
<?php include_once('../../about.html'); ?>