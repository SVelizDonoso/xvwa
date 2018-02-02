 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Inyección de Plantilla del Lado del Servidor (SSTI)</a></h3>
        
        <p align="justify">
	La aplicación web usa plantillas para hacer que las páginas web se vean más dinámicas. La inyección de plantilla se produce cuando la entrada del usuario está incrustada
	en una plantilla de una manera insegura. Sin embargo, en la observación inicial, esta vulnerabilidad es fácil de confundir con los ataques XSS. Pero los ataques de SSTI se pueden 
        usar para atacar directamente las partes internas de los servidores web y aprovechar el ataque de forma más compleja, como la ejecución remota de código y el compromiso completo del servidor.      </p>
        <p>Leer más de Inyección de plantilla del lado del servidor (SSTI)<br><br>
	<a target="_blank" href="https://securityhacklabs.blogspot.cl/2016/10/vulnerabilidad-server-side-template.html">https://securityhacklabs.blogspot.cl/2016/10/vulnerabilidad-server-side-template.html </a></p>
        <a target="_blank" href="http://blog.portswigger.net/2015/08/server-side-template-injection.html">http://blog.portswigger.net/2015/08/server-side-template-injection.html </a></p>

    </div>

</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>
        Sugerencias:<br>
        <ul>
        <li>El motor de plantilla utilizado es TWIG</li>
        <li>Función utilizada = "Twig_Loader_String" </li>
        </ul>
        </p>
        <p>
            <form method='get' action=''>
                <div class="form-group"> 
                    <label></label>
                    <input class="form-control" width="50%" placeholder="Enter Your Name" name="name"></input> <br>
                    <div align="right"> <button class="btn btn-default" type="submit" name='submit'>Enviar Nombre</button></div>
               </div> 
            </form>
            <?php
                if (isset($_GET['submit'])) {
                    $name=$_GET['name'];
                    // include and register Twig auto-loader
                    include 'vendor/twig/twig/lib/Twig/Autoloader.php';
                    Twig_Autoloader::register();
                    try {
                          // specify where to look for templates
                              $loader = new Twig_Loader_String();
  
                          // initialize Twig environment
                              $twig = new Twig_Environment($loader);
                         // set template variables
                         // render template
                            $result= $twig->render($name);
                            echo "Hola $result";
  
                    } catch (Exception $e) {
                          die ('ERROR: ' . $e->getMessage());
                        }
                    }

            ?>
        </p>
    </div>
      
    <hr>

</div>
<?php include_once('../../about.html'); ?>