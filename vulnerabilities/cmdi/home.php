 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Inyección de Comando OS</a></h3>
        
        <p align="justify">
        Algunas aplicaciones usan comandos del sistema operativo para ejecutar ciertas funcionalidades mediante el uso de malas prácticas de codificación.
	digamos, por ejemplo, el uso de funciones como system (), shell_exec (), etc. Esto permite a un usuario inyectar comandos arbitrarios que se ejecutarán en el host remoto con
        el privilegio del usuario del servidor web.
	Un atacante puede engañar al intérprete para que ejecute los comandos que desee en el sistema.</p><br><br>
        <p>Leer más de Inyección de comando OS <br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/Inyecci%C3%B3n_de_C%C3%B3digo">https://www.owasp.org/index.php/Inyecci%C3%B3n_de_C%C3%B3digo </a></p>
        <a target="_blank"https://www.welivesecurity.com/la-es/2013/04/30/inyeccioncomandos-servidores-web/">https://www.welivesecurity.com/la-es/2013/04/30/inyeccioncomandos-servidores-web/ </a></p>
    </div>
    
</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>ingrese la IP o nombre del host para comprobar disponibilidad.  
            <form method='get' action=''>
                <div class="form-group"> 
                    <label></label>
                    <input class="form-control" width="50%" placeholder="Ingrese IP/HOSTNAME" name="target"></input> <br>
                    <div align="right"> <button class="btn btn-default" type="submit">Enviar</button></div>
               </div> 
            </form>
        </p>
    </div>
            <?php
                $target = $_REQUEST[ 'target' ];
                if($target){
                    if (stristr(php_uname('s'), 'Windows NT')) { 
            
                    $cmd = shell_exec( 'ping  ' . $target );
                    echo '<pre>'.$cmd.'</pre>';

                    } else { 
                        $cmd = shell_exec( 'ping  -c 3 ' . $target );
                        echo '<pre>'.$cmd.'</pre>';
                    }
                }
            ?>
        
      
    <hr>
    
</div>

<?php include_once('../../about.html'); ?>