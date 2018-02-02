 <div class="thumbnail">
    <div class="caption-full">
        <h3><a href="#">Redirecciones y Reenvíos Incorrectos</a></h3>
        
        <p align="justify">
        Algunas aplicaciones usan estas funcionalidades para redireccionar y reenviar al usuario a otras páginas web u otro sitio web. Dicha solicitud con poca validación puede permitir que un atacante redirija a los usuarios legítimos a phishing o páginas web malformadas.
        </p><br><br>
        <p>Leer más de Redirecciones y Reenvíos Incorrectos <br><br>
        <strong><a target="_blank" href="https://infow.wordpress.com/2011/09/15/owasp-top-ten-10-redirecciones-y-reenvios-no-validados/">https://infow.wordpress.com/2011/09/15/owasp-top-ten-10-redirecciones-y-reenvios-no-validados/ </a></p></strong>
	<strong><a target="_blank" href="http://www.reydes.com/d/?q=Vulnerabilidad_de_Redireccion_no_Validada_en_Sitio_Web_de_Mcafee">http://www.reydes.com/d/?q=Vulnerabilidad_de_Redireccion_no_Validada_en_Sitio_Web_de_Mcafee</a></p></strong>
	<strong><a target="_blank" href="https://www.owasp.org/index.php/Unvalidated_Redirects_and_Forwards_Cheat_Sheet">https://www.owasp.org/index.php/Unvalidated_Redirects_and_Forwards_Cheat_Sheet </a></p></strong>
    </div>

</div>
<div class="well">
    <p>
        <form method="get" action="">
            <div class="form-group">
                <div class="text-left">
                <h3>Principales consorcios de seguridad de aplicaciones web</h3> <br>
                <strong>
                <a href="redirect.php?forward=https://www.owasp.org">Open Web Application Security Project</a> <br>
                <a href="redirect.php?forward=http://www.webappsec.org/">The Web Application Security Consortium (WASC)</a>
                </strong>
                <?php 
                    
                    if (isset($_GET['forward'])){
                        $forward=$_GET['forward'];
                        if (strlen($forward)>0){
                            ob_start();
                            ob_end_flush(); 
                            header("Location: ".$forward);
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </p>      
    <hr>
    
</div>
<?php include_once('../../about.html'); ?>