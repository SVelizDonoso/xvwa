 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Criptografía</a></h3>
        
        <p align="justify">
        Un desarrollador debe comprender qué criptografía debe ser adecuada para cada módulo requerido en la aplicación, puede ser codificación, Cifrado simétrico/asimétrico o hash. La implementación insegura de la criptografía puede conducir a una fuga de datos confidenciales.
        </p>
        <p>Leer más de Criptografía<br>
        <a target="_blank" href="http://www.criptored.upm.es/guiateoria/gt_m001a.htm">http://www.criptored.upm.es/guiateoria/gt_m001a.htm</a></p>
        <a target="_blank" href="https://www.dragonjar.org/crypt4you-aprende-criptografia-y-seguridad-informatica-de-otra-forma-y-gratis.xhtml">https://www.dragonjar.org/crypt4you-aprende-criptografia-y-seguridad-informatica-de-otra-forma-y-gratis.xhtml</a></p>
        <a target="_blank" href="https://www.certsi.es/blog/aleatorio">https://www.certsi.es/blog/aleatorio</a></p>
        <a target="_blank" href="http://www.criptored.upm.es/crypt4you/temas/criptografiaclasica/leccion9.html">http://www.criptored.upm.es/crypt4you/temas/criptografiaclasica/leccion9.html</a></p>
        <a target="_blank" href="https://www.owasp.org/index.php/Guide_to_Cryptography">https://www.owasp.org/index.php/Guide_to_Cryptography</a></p>

    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 

            <label>Cifrado Inseguro</label>	    
            <p>Escriba su texto aquí.  
                <form method='get' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <input class="form-control" width="50%" placeholder="Escriba su texto aquí" name="item" required ></input> <br>
                        <div align="right"> <button class="btn btn-default" type="submit">Cifrar Mensaje</button></div>
                    </div> 
                </form>
         </div>
         </p>
         

        <hr>
        <div class="col-lg-8">
                <?php
                //Cifrado de Cesar
		function cifrarc($M,$k)
		{ 	for($i=0; $i<strlen($M); $i++)$C.=chr((ord($M[$i])+$k)%255);
			return $C;
		}
		/*
		Funcion para el decifrado: M1 = ( C1 - k + N ) modulo N
		C: Texto cifrado donde C1 es la primera posicion de C
		k: Numero de desplazamiento 
		N=255: Tamano del alfabeto, codigo ascii y codigo ascii extendido
		*/
		function decifrarc($C,$k)
		{  	for($i=0; $i<strlen($C); $i++)$M.=chr((ord($C[$i])-$k+255)%255);
			return $M;
		}
                // Cifrado de vigenere
		function vige($texto,$clave,$ty=true)
		{   $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";	
			$texto=strtoupper($texto);
			$clave=strtoupper($clave);		
			$cla=$clave;		
			while(strlen($clave)<strlen($texto))$clave.=$cla;			
			$result= '';	
			for($i=0; $i< strlen($texto); $i++) 
			{	if($texto[$i]==' '){ $result.=$texto[$i]; continue; }
				$idx = strpos($alfabeto,$texto[$i]);
				if($idx < 0) $result .= $texto[$i];
				else {	
					$k = strpos($alfabeto,$clave[$i]);				
					$idx+=$ty?$k:strlen($alfabeto)-$k;
					$result.=$alfabeto[$idx % strlen($alfabeto)];
				}
			}
		return $result;
		}
 
		function cifradov($texto,$clave){ return vige($texto,$clave,true); }
		function decifradov($texto,$clave){ return vige($texto,$clave,false); }



                $str = $_GET['item'];
		$k = 7;
		$key='ESUNSECRETO';
                if($str){

                    echo "<table style=\"border-collapse:collapse; table-layout:fixed; width:700px;\">";
                    echo "<tr><th width>Criptografía Utilizada</th><th>Valor</th></tr>";
                    echo "<tr><td style=\"word-wrap:break-word;\">&nbsp;&nbsp;<br></td>";
                    echo  "<td style=\"word-wrap:break-word;\">&nbsp;&nbsp;</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
                    # --- ENCODING ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Base64 Encode</td>";
                    echo "<td style=\"word-wrap:break-word;\">". base64_encode($str)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                    # --- Cifrado Cesar ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Cifrado de Cesar<br></td>";
                    echo  "<td style=\"word-wrap:break-word;\">". cifrarc(str_replace(' ','',$str),$k)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

		   # --- Cifrado Cesar ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Cifrado de Cesar + Base64 Encode<br></td>";
                    echo  "<td style=\"word-wrap:break-word;\">". base64_encode(cifrarc(str_replace(' ','',$str),$k))."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                   
		    # --- Cifrado Vigenere ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Cifrado de Vigenere<br></td>";
                    echo  "<td style=\"word-wrap:break-word;\">". cifradov(str_replace(' ','',$str),$key)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
			
		    # --- Cifrado Vigenere ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Cifrado de Vigenere + Base64 Encode<br></td>";
                    echo  "<td style=\"word-wrap:break-word;\">". base64_encode(cifradov(str_replace(' ','',$str),$key))."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                    # --- HASHING ---

                    echo "<tr><td style=\"word-wrap:break-word;\">MD5 Hashing sin salting</td>";
                    echo "<td style=\"word-wrap:break-word;\">" . md5($str)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
		
		    echo "<tr><td style=\"word-wrap:break-word;\">SHA1 Hashing sin salting</td>";
                    echo "<td style=\"word-wrap:break-word;\">" . sha1($str)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                    //include_once('PasswordHash.php');
                    //echo "<tr><td style=\"word-wrap:break-word;\">PBKDF2 with sha256 and 1000 iteration <br> (salt : hash)</td>";
                    //echo "<td style=\"word-wrap:break-word;\">" . create_hash($str)."</td></tr>";
                    // "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
                }
                ?>
            </table>
        </div>
        
    </div>
<?php include_once('../../about.html'); ?>