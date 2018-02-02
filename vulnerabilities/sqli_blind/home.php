 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#">Inyección SQL A Ciegas</a></h3>
        
        <p align="justify">
        Las inyecciones SQL a ciegas son difíciles de detectar y explotar ya que la aplicación está diseñada para manejar errores y excepciones inteligentemente. Sin embargo, la vulnerabilidad aún existe. Las inyecciones SQL a ciegas son casi idénticas a las inyecciones de SQL basadas en errores o normales. La diferencia aquí es que el  atacante no verá ningún mensaje de error de back-end en este caso. Dado que no se proporcionan errores en las respuestas web, si no se cuenta con el entranamiento adecuado, resulta difícil para un atacante explotar esta vulnerabilidad.. 
        </p><br><br>
        <p>Leer más de Inyección SQL A Ciegas<br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/Inyecci%C3%B3n_SQL_Ciega">https://www.owasp.org/index.php/Inyecci%C3%B3n_SQL_Ciega </a></p>
	<a target="_blank" href="http://www.elladodelmal.com/2007/06/blind-sql-injection-i-de-en-mysql.html">http://www.elladodelmal.com/2007/06/blind-sql-injection-i-de-en-mysql.html </a></p>
	<a target="_blank" href="https://www.securityartwork.es/2014/06/04/leer-htaccess-a-traves-de-blind-sql-injection/">https://www.securityartwork.es/2014/06/04/leer-htaccess-a-traves-de-blind-sql-injection/</a></p>
	<a target="_blank" href="http://www.securitybydefault.com/2014/05/blind-sqli-cuando-la-inyeccion-no.html">http://www.securitybydefault.com/2014/05/blind-sqli-cuando-la-inyeccion-no.html </a></p>
	<a target="_blank" href="https://www.owasp.org/index.php/Blind_SQL_Injection">https://www.owasp.org/index.php/Blind_SQL_Injection </a></p>
    </div>

    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p>Buscar por código de artículo o usar la opción de búsqueda  
                <form method='post' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <select class="form-control" name="item">
                            <option value="">Seleccione Artículo</option>
                            <?php
                            include('../../config.php');
                            if($conn->connect_errno > 0){
                                echo "Error al conectarse a la base de datos";
                            }else{ 
                                $sql = 'select itemid from caffaine';
                                $result = $conn->query($sql);
                                while($rows = $result->fetch_assoc()){
                                    echo "<option value=\"".$rows['itemid']."\">".$rows['itemid']."</option>";
                                }
                            } 

                            echo "</select><br>";
                            echo "<input class=\"form-control\" width=\"50%\" placeholder=\"Buscar\" name=\"search\"></input> <br>";
                            echo "<div align=\"right\"> <button class=\"btn btn-default\" type=\"submit\">Enviar</button></div>";
                            echo "</div> </form> </p>";
                            echo " </div>";
                            $item = isset($_POST['item']) ? $_POST['item'] : '';
                            $search = isset($_POST['search']) ? $_POST['search'] : '';
                            $isSearch = false;
                            if(($item!="") && $search!=""){ 
                                echo "<br><ul class=\"featureList\">";
                                echo "<li class=\"cross\">¡Error! No se puede usar la opción de búsqueda y código de elemento. Busque usando cualquiera de estas opciones.</li>";
                                echo "</ul>";
                            }else if($item){
                                $sql = "select * from caffaine where itemid = ".$item;
                                $result = $conn->query($sql);
                                $rowcount = $result->num_rows;
                                if($rowcount>0){
                                    $isSearch = true;
                                }
                            }else if($search){
                                $sql = "SELECT * FROM caffaine WHERE itemname LIKE '%" . $search . "%' OR itemdesc LIKE '%" . $search . "%' OR categ LIKE '%" . $search . "%'";
                                $result = $conn->query($sql);
                                $rowcount = $result->num_rows;
                                if($rowcount>0){
                                    $isSearch = true;
                                }
                            }
                            if($isSearch){
                                echo "<table>";
                                while($rows = $result->fetch_assoc()){
                                    echo "<tr><td><b>Item Codigo: </b>".$rows['itemcode']."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Descripción : </b>".$rows['itemdesc']."</td></tr>";
                                    echo "<tr><td><b>Item Nombre : </b>".$rows['itemname']."</td></tr>";
                                    echo "<td><img src='".$rows['itemdisplay']."' height=130 weight=20/></td>";
                                    echo "<tr><td><b>Categoria : </b>".$rows['categ']."</td></tr>";
                                    echo "<tr><td><b>Precio : </b>".$rows['price']."$</td></tr>"; 
                                    echo "<tr><td colspan=3><hr></td></tr>";
                                }
                                echo "</table>";                            
                            }

                            ?>




                            <hr>
                           
                        </div>
                    </div>
                </div>
                
                        <?php include_once('../../about.html'); ?>