<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Falsificación de Solicitudes Cruzadas (CSRF)</a></h3>
        
        <p align="justify">
        Los ataques CSRF son difíciles de identificar y explotar ya que tiene ciertos requisitos que cumplir antes del ataque exitoso. En primer lugar, una víctima debe estar en sesión activa, es decir, ya debe haber iniciado sesión. En segundo lugar, un atacante debe ser capaz de predecir las solicitudes en las que existen problemas de CSRF y engañar a la víctima para que haga clic en él.
         <br> </ p> <p> Inicie sesión en la aplicación antes de explorar esta vulnerabilidad. </p><br><br>
        <p>Leer más de Falsificación de solicitudes cruzadas (CSRF)<br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/Top_10_2007-Vulnerabilidades_de_Falsificaci%C3%B3n_de_Petici%C3%B3n_en_Sitios_Cruzados_(CSRF)">https://www.owasp.org/index.php/Top_10_2007-Vulnerabilidades_de_Falsificaci%C3%B3n_de_Petici%C3%B3n_en_Sitios_Cruzados_(CSRF) </a></p>
	<a target="_blank" href="https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/">https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/ </a></p>
        <a target="_blank" https://igmoweb.com/2017/11/29/cross-site-request-forgery-dos-ejemplos-para-entenderlo/">https://igmoweb.com/2017/11/29/cross-site-request-forgery-dos-ejemplos-para-entenderlo/ </a></p>
        <a target="_blank" https://diego.com.es/ataques-csrf-cross-site-request-forgery-en-php">https://diego.com.es/ataques-csrf-cross-site-request-forgery-en-php </a></p>
	<a target="_blank" http://www.pentester.es/2013/03/cross-site-request-forgery.html">http://www.pentester.es/2013/03/cross-site-request-forgery.html </a></p>
    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p><h4>Cambio de Clave</h4>  
                <form method='get' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <input type="password" class="form-control" width="50%" placeholder="ingrese Nueva Clave" name="passwd"></input> <br>
                        <input type="password" class="form-control" width="50%" placeholder="Confirme su Nueva Clave" name="confirm"></input> <br>
                        <div align="right"> <button class="btn btn-default" type="submit" name="submit" value="submit">Cambiar Clave</button></div>
                    </div> 
                </form>
                <?php
                $current_user = isset($_SESSION['user']) ? $_SESSION['user'] : '' ;
                $password = isset($_GET['passwd']) ? $_GET['passwd'] : '' ;
                $confirm = isset($_GET['confirm']) ? $_GET['confirm'] : '' ;
                include('../../config.php');
                if($current_user){
                    if(isset($_GET['submit'])){
                        if(empty($password) && empty($password)){
                            echo "Passwords can not be blank !! Try Again ";
                        }else if($password != $confirm){
                            echo "Passwords don't match !! Try Again";
                        }else{
                            $stmt = $conn1->prepare("UPDATE users set password=:pass where username=:user");
                            $stmt->bindParam(':pass', md5($password));
                            $stmt->bindParam(':user', $current_user);
                            $stmt->execute(); 
                            if($stmt->rowCount() > 0){
                                echo "<b>Su Clave se cambio con exito!<br></b>";
                            }else{
                                echo "<b>Usuario Invalido<br></b>";
                            }
                        }
                    }
                }else{
                    echo "<b> Necesitas iniciar sesion para cambiar tu clave. </b>";
                }
                ?>
            </p>
        </div>
        
        <hr>
        
    </div>

    <?php include_once('../../about.html'); ?>