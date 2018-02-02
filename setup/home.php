 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Xtreme Vulnerable Web Application (XVWA) - Configuración</a></h4>
        </div>
    <div class="col-lg-12"> 
        <p align="center"> 
            <form method='get' action=''>
                <div class="form-group" align="center"> 
                    <label></label>
                    <button class="btn btn-primary" name="action" value="do" type="submit">Enviar / Restauración</button>
               </div> 
            </form>
        </p>
    </div>
</div>
<?php
include('../config.php');
function cleanup($conn,$XVWA_WEBROOT){
    // clean the database
    $tables = array('comments','caffaine','users');
    for($i=0;$i<count($tables);$i++){
        $sql = 'DROP TABLE '. $tables[$i].';';
        $sqlexec = $conn->query($sql);
    }
    // clean extra files
    $files = glob('../img/uploads/*'); 
    foreach($files as $file){ 
        if(is_file($file)){
            unlink($file); 
        }
    }
     
}
$submit = isset($_GET['action']) ? $_GET['action'] : '';
// $submit=$_GET['action'];
 if($submit){
     echo "<div class=\"well\">";  
     echo "<ul class=\"featureList\">";
     if($conn->connect_errno > 0){
        die("<li class=\"cross\">La conexión falló. Verifica el archivo de configuración.".$conn->connect_error ."</li>");
     }else{
        //connection successfull.
            
            cleanup($conn,$XVWA_WEBROOT);
            echo "<li class=\"tick\">Conectado a la base de datos con éxito.</li>";   
            // creating comment tables
            $table_comment=$conn->query('CREATE TABLE comments(id int not null primary key auto_increment,user varchar(30),comment varchar(100),date varchar(30))');
            if($table_comment){
                $insert_comment=$conn->query('INSERT INTO comments (id,user,comment,date) VALUES (\'1\', \'admin\', \'Sigue publicando tus comentarios aquí \', \'17 Ene 2018\');');
                if($insert_comment){
                    echo "<li class=\"tick\">Tabla comentarios creada con éxito.</li>"; 
                }else{
                    echo "<li class=\"cross\">No se puede crear tabla de comentarios. Prueba enviar / restablecer nuevamente. </li>"; 
                }
            }else{            
                echo "<li class=\"cross\">Error al usar / seleccionar la base de datos. Verifique el archivo de configuración.".mysql_error()."</li>";
            }

            //creating product_caffe table
            $table_product=$conn->query('CREATE TABLE caffaine(itemid int not null primary key auto_increment, itemcode varchar(15),itemdisplay varchar(500),itemname varchar(50),itemdesc varchar(1000),categ varchar(200),price varchar(20))');
            if($table_product){
                $itemcode = array('XVWA0987','XVWA3876','XVWA4589','XVWA7619','XVWA5642','XVWA7569','XVWA3671','XVWA1672','XVWA4276','XVWA9680');
                $itemname = array('Affogato','Americano','Bicerin','Cafe Bombon','Cafe au lait','Caffe corretto','Caffe latte','Cafe melange','Cafe mocha','Cappuccino');
                $itemdesc = array('Un affogato (italiano, "ahogado") es una bebida a base de café. Por lo general, toma la forma de una bola de gelatina de vainilla o helado cubierto con una taza de espresso caliente. Algunas variaciones también incluyen un trago de Amaretto u otro licor.','Un Americano es una bebida a base de espresso diseñada para parecerse al café elaborado en un filtro de goteo, considerado popular en los Estados Unidos de América. Esta bebida consiste en un café espresso simple o doble combinado con hasta cuatro o cinco onzas de agua caliente en una taza de dos demitasse.','Se piensa que su origen se remonta a un típico local turinés que desde entonces lleva el mismo nombre y que guarda con celo la receta tradicional; los camareros son obligados, por contrato a guardar el secreto. Pero de todas formas es posible encontrarlo en las mejores cafeterías de Turín, en versiones un poco diferentes en cuanto a dosis y también en la cafetería homónima de Montesarachio en la provincia de Benevento.','Cafe Bombon se hizo popular en Valencia, España, y se extendió gradualmente al resto del país. Podría haber sido recreado y modificado para adaptarse a las papilas gustativas europeas, ya que en muchas partes de Asia, como Malasia, Tailandia y Singapur, la misma receta de café que se llama "Kopi Susu Panas" (Malasia) o "Kafe Ron" (Tailandia) ya ha existido durante décadas y es muy popular en los puestos de "mamak" o "kopitiams" en Malasia.','Café au lait es una bebida de café francesa. En Europa, "café au lait" proviene de la misma tradición continental que "caffè latte" en Italia, "café con leche" en España, "kawa biala" ("café blanco") en Polonia, "Milchkaffee" en Alemania, " Grosser Brauner "en Austria", "koffie verkeerd" en Holanda y "café com leite" en Portugal, simplemente "café con leche".','Cafe corretto es una bebida italiana que consiste en un trago de espresso con un trago de licor, generalmente grappa, y a veces sambuca o brandy. También se lo conoce (fuera de Italia) como un "espresso corretto". Se ordena como "un caffè corretto alla grappa", "[...] corretto alla sambuca" o "[...] corretto al cognac", según el licor deseado.','En Italia, el café con leche significa leche. Lo que en los países de habla inglesa ahora se llama café con leche es la abreviatura de "caffelatte" o "caffellatte" ("caffè e latte"). La forma italiana significa "café y leche", similar al café con leche francés, el café con leche español y el café con leche portugués. Otras bebidas que se encuentran comúnmente en las tiendas que sirven caffè lattes son cappuccinos y expresos. Pedir un "café con leche" en Italia le dará al cliente un vaso de leche caliente o fría. Caffè latte es una bebida a base de café hecha principalmente de espresso y leche al vapor. Consiste en un tercio de expreso, dos tercios de leche calentada y aproximadamente 1 cm de espuma. Dependiendo de la habilidad del barista, la espuma se puede verter de tal manera que se cree una imagen. Las imágenes comunes que aparecen en lattes son corazones de amor y helechos. El arte de Latte es un tema interesante en sí mismo.','Café mélange es un café negro mezclado (francés "mélange") o cubierto con crema batida, muy popular en Austria, Suiza y los Países Bajos.','Cafe Mocha o café mocha, es una invención estadounidense y una variante de un café con leche caffe, inspirado en la bebida de café Turín Bicerin. El término "caffe mocha" no se usa en Italia ni en Francia, donde se lo conoce como "mocha latte". Al igual que un café con leche caffe, es típicamente un tercio expreso y dos tercios de leche al vapor, pero se agrega una porción de chocolate, generalmente en forma de polvo de cacao dulce, aunque muchas variedades usan jarabe de chocolate. Mochas puede contener chocolate oscuro o con leche.','El capuchino (del italiano cappuccino) es una bebida nacida en Italia, preparada con café expreso y leche montada con vapor para crear la espuma, que en ocasiones lleva también cacao o canela en polvo. Un capuchino se compone de 125 ml de leche y 25 ml de café expreso.

La característica del capuchino la da el café expreso y la textura y temperatura de la leche, ya que esta no debe pasar de los 70 °C. La técnica del barista para dar volumen a la leche es introduciendo, por medio de vapor a presión, minúsculas burbujas de aire que le otorgan una textura cremosa.');
                $categ = array('Espresso,Vanilla Gelato','Espresso','Espresso, Chocolate, Milk','Espresso, Sweetened Milk','Coffee, Milk','Espresso, Liquor Shot','Espresso, Milk','White Creame','Latte, Chocolate','Espresso, Milk');
                $itemprice = array(4.69,5.00,8.90,7.08,10.15,6.01,6.04,3.06,4.05,3.06);
                for($i = 0; $i<count($itemcode); $i++){
		    $pic = '/xvwa/img/'.$itemcode[$i].'.png';
                    $sql = 'INSERT into caffaine(itemcode,itemdisplay,itemname,itemdesc,categ,price) VALUES (\''.$itemcode[$i].'\',\''.$pic.'\',\''.$itemname[$i].'\',\''.$itemdesc[$i].'\',\''.$categ[$i].'\',\''.$itemprice[$i].'\');';
                    $insert_product=$conn->query($sql);
                }
                if($insert_product){
                    echo "<li class=\"tick\">Productos de mesa creados con éxito.</li>"; 
                }else{
                    echo "<li class=\"cross\">No se pueden crear productos de mesa. Prueba enviar / restablecer nuevamente.".mysql_error()." </li>"; 
                }
            }else{            
                echo "<li class=\"cross\">Error al usar / seleccionar la base de datos. Verifique el archivo de configuración.".mysql_error()."</li>";
            }
            //creating user table
            $table_user=$conn->query("CREATE table users(uid int not null primary key auto_increment, username varchar(20),password varchar(50))");
            if($table_user){
                $uname = array('admin','xvwa','user');
                $pwd = array('21232f297a57a5a743894a0e4a801fc3','570992ec4b5ad7a313f5dc8fd0825395','25890deab1075e916c06b9e1efc2e25f');
                for($i=0;$i<count($uname);$i++){
                    $sql = "INSERT INTO users (username,password) values ('".$uname[$i]."','".$pwd[$i]."')";
                    $insert_user=$conn->query($sql);
                }
                if($insert_user){
                    echo "<li class=\"tick\">tabla de Usuarios creada con éxito.</li>"; 
                }else{
                    echo "<li class=\"cross\">No se pueden crear tabla de usuarios. Prueba enviar / restablecer nuevamente.".mysql_error()." </li>"; 
                }
            }else{
                echo "<li class=\"cross\">Error al usar / seleccionar la base de datos. Verifique el archivo de configuración.".mysql_error()."</li>";   
            }
	    //Set parametros token vulnerables
            $file = fopen("../vulnerabilities/token/entradas.csv","w");
	    $x = array ("ID,Celular,N_Aleatorio,Token,Token_Base64");
            fputcsv($file,$x);
            $x = array ("1,44444444,19072,9246eb8610d571d99a95f476a90a60b3,OTI0NmViODYxMGQ1NzFkOTlhOTVmNDc2YTkwYTYwYjM=");
            fputcsv($file,$x);
	    $x = array ("2,77777777,27512,5236d2d466e7a1d9785a33e298a58c3c,NTIzNmQyZDQ2NmU3YTFkOTc4NWEzM2UyOThhNThjM2M=");
            fputcsv($file,$x);
	    $x = array ("3,33333333,37623,1146d96286ade57a9fa715376dae4c20,MTE0NmQ5NjI4NmFkZTU3YTlmYTcxNTM3NmRhZTRjMjA=");
            fputcsv($file,$x);
            fclose($file);
		echo "<li class=\"tick\">Creación de tokens con éxito.</li>"; 
       
        echo "<br><li class=\"tick\">Configuración finalizada.</li>";

        echo "<hr>";

        echo "</div>";
    }
     echo "</ul>";
}

?>
