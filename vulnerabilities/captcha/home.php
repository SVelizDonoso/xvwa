 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Captcha Vulnerable a Ataques OCR</a></h3>
        
        <p align="justify">
         Actualmente hacer un captcha seguro requiere métodos complicados de implementar que únicamente poseen las grandes empresas. Pero hay métodos 
	para dificultar a los programas OCR. Uno de estos métodos es el «método del tachado». Este método consiste en tachar las letras del captcha de manera que un
	 humano sepa identificarlas pero un software OCR no pueda separar las unas de las otras. Para este método es importante utilizar un mismo color de letra (realmente 
	modificar el color de poco sirve ya que para reconocerlas convierten la imagen a color negro) y tachar con el mismo color que las letras, a ser posible, una línea
	 que no sea recta y de más de un píxel de grosor.
        </p><br><br>
        <p>Leer más de Captcha Vulnerables a ataques OCR <br><br>
        <a target="_blank" href="http://www.hackplayers.com/2017/05/pentesterlab-web-for-pentester-2-captcha.html">http://www.hackplayers.com/2017/05/pentesterlab-web-for-pentester-2-captcha.html</a></p>
        <a target="_blankhttps://soyvulnerable.com/es/blog/seguridad-de-los-captchas/a>https://soyvulnerable.com/es/blog/seguridad-de-los-captchas/</p>
	<a target="_blank"http://jadcode.blogspot.cl/2013/05/saltandose-captchas-con-shell-scripting.html">http://jadcode.blogspot.cl/2013/05/saltandose-captchas-con-shell-scripting.html</a></p>
	<a target="_blank"https://www.owasp.org/index.php/Testing_for_Captcha_(OWASP-AT-012)">https://www.owasp.org/index.php/Testing_for_Captcha_(OWASP-AT-012)</a></p>
    </div>
    
</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>Ingresar el texto mostrado en la imagen.  
            <form method='post' action=''>
                <div class="form-group"> 
                    <label><img src="captcha.php" width="100" height="30" vspace="3"></label>
                    <input class="form-control" width="50%" placeholder="Ingrese texto de la imagen" name="tmptxt"></input> <br>
                     <div align="right"> <button class="btn btn-default" type="submit">Enviar</button></div>
		    <input name="action" type="hidden" value="checkdata">
               </div> 
            </form>
        </p>
    </div>


		
		<?php
		if ($_POST['action'] == "checkdata") {
		session_start();
		
			if ($_SESSION['tmptxt'] == $_POST['tmptxt']) {
				echo "<div class='alert alert-success'><strong>Excelente!</strong> Lograste resolver el Captcha.</div>";
			} else {
				echo "<div class='alert alert-danger'><strong>Datos incorrectos!</strong> Intentalo Nuevamente por Favor!</div>";
			}
		exit;
		}
		?>
        
      
    <hr>
    
</div>

<?php include_once('../../about.html'); ?>