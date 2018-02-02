 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Token Hijacking</a></h3>
        
        <p align="justify">
        Los servidores Web actuales tratan con un gran número de usuarios. Normalmente se realiza un proceso de identificación sobre las cookies u otros identificadores de sesión para diferenciar entre todos ellos. Si estos identificadores de sesión usan una secuencia predecible, un atacante solo necesita generar un valor de la secuencia para presentar un token de sesión aparentemente válido. Esto puede ocurrir en gran número de sitios.
	La única manera de generar un token de autenticación seguro es asegurándose de que no hay manera de predecir su secuencia, en otras palabras: números realmente aleatorios.
        </p>
        <p>Leer más de Token Hijacking<br>
        <a target="_blank" href="http://www.0verl0ad.net/2011/08/smf-20-token-hijacking.html">http://www.0verl0ad.net/2011/08/smf-20-token-hijacking.html</a></p>
        <a target="_blank" href="http://www.eslomas.com/2011/09/proteccion-anti-csrf-con-tokens-en-php/">http://www.eslomas.com/2011/09/proteccion-anti-csrf-con-tokens-en-php/</a></p>
        <a target="_blank" href="https://www.certsi.es/blog/aleatorio">https://www.certsi.es/blog/aleatorio</a></p>
        <a target="_blank" href="https://www.owasp.org/index.php/Guide_to_Cryptography">https://www.owasp.org/index.php/Guide_to_Cryptography</a></p>

    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 

            <label>Consigue tu entrada para en Evento del Año Digital</label><br><br>	    
            <p>Escribe su Teléfono Aquí:  
                <form method='get' action=''>
                    <div class="form-group"> 
                        <label></label><br><br>
                        <input class="form-control" width="50%" placeholder="Escribe tu Número de Teléfono" name="numero" required type="number" maxlength="8"></input> <br>
                        <div align="right"> <button class="btn btn-default" type="submit">Solicitar Entrada</button></div>
                    </div> 
                </form>
         </div>
         </p>
         

       
        <div class="col-lg-8">
                <?php
                
                $str = $_GET['numero'];
                if($str){
                        $linecount = count(file('entradas.csv'));
			$token = md5($linecount.''.mt_rand(11,9999));
                        $file = fopen("entradas.csv","a+");
                        //echo "".$linecount.",".$str.",".$linecount.''.mt_rand(11,9999).",".$token.",".base64_encode($token);
			$x = array ($linecount.",".$str.",".$linecount.''.mt_rand(11,9999).",".$token.",".base64_encode($token));
                        fputcsv($file,$x );
                        fclose($file);	
                        //echo 'http://'.$_SERVER['SERVER_NAME'].'/xvwa/vulnerabilities/token/?token='.base64_encode($token);
                ?>
			<br><br>
                        <div id='cel' style="background: url(telefono2.png) no-repeat;width:700px;height:1000px">
                               <br><br><br><br><br>
                                <p style=" margin: 0cm 0cm 0cm 2cm;">Felicitaciones ya tienes tu entrada <br>para el evento, te recomendamos <br>descargar la imagen o imprimir<br> y mostrarla en porteria.</p>
				<br>
				<div id="qrcodeTable" style=" margin: 0cm 0cm 0cm 2cm;"></div>
			</div>
			<script>
				jQuery('#qrcodeTable').qrcode({
				   text	: "<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/xvwa/vulnerabilities/token/?token='.base64_encode($token);   ?>"
                                   
				});
                                $("#cel").fadeIn("slow");
			</script>
				
		<?php
		}

                  //revisar token
                $busqueda=0;
                $str = $_GET['token'];
                if($str){
                      $token = base64_decode($str);
                      if (($fichero = fopen("entradas.csv", "r")) !== FALSE) {
    			while (($datos = fgetcsv($fichero, 1000)) !== FALSE) {
                                 $datos = explode(",", $datos[0]); 
                                 if ($datos[3] == $token) {
                                     $busqueda=1; 
                                }
   			 }
		     }
				if ($busqueda==1) {
				     echo "<div class='alert alert-success'><strong>Excelente!</strong> La Entrada Para el Evento es Valida!</div>";  
                                }else{
				    echo "<div class='alert alert-danger'><strong>Detener en Porteria</strong> Posible Falsificación de Entrada!</div>";  
				}

		}

              
                ?>
              
            
        </div>
        
    </div>
<?php include_once('../../about.html'); ?>