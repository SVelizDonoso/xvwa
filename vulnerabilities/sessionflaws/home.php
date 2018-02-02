 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Flags de Sesiones Web </a></h3>
        
        <p align="justify">
        Las aplicaciones web requieren una mejor gestión de sesión para seguir el estado de la aplicación y sus actividades para los usuarios. Una gestión de sesión insegura puede provocar ataques como la predicción de la sesión, el secuestro, la fijación y los ataques de repetición. 
        </p><br><br>
        <p>Leer más de Flags de sesiones Web  <br><br>
	<a target="_blank" href="https://diego.com.es/seguridad-de-sesiones-en-php">https://diego.com.es/seguridad-de-sesiones-en-php</a></p>
        <a target="_blank" href="https://www.owasp.org/index.php/Session_Management_Cheat_Sheet">https://www.owasp.org/index.php/Session_Management_Cheat_Shee</a></p>

    </div>
</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>
        <strong>
            <?php
            if($_SESSION['user']){
                echo "Bienvenido ". ucfirst($_SESSION['user']); 
                echo "<br><br><a href='../../logout.php'>Salir de la aplicación</a>";
            }else{
                echo "No has iniciado sesión. <br> Por favor, inicia sesión y vuelve a intentarlo.";
            }
        ?>
        </strong>
        </p>



    </div>
      
    <hr>
    
</div>
