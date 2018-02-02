 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h3><a href="#"> Referencia Insegura a Objetos</a></h3>
        
        <p align="justify">
        Esta vulnerabilidad ocurre cuando la aplicación expone objetos directos a un recurso interno, como archivos, directorio, claves, etc. Tales mecanismos podrían llevar a un atacante a predecir objetos que también se referirían a recursos no autorizados.. 
        </p><br><br>
        <p>Leer más de Referencia Insegura a Objetos <br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/Top_10_2007-Referencia_Insegura_y_Directa_a_Objetos">https://www.owasp.org/index.php/Top_10_2007-Referencia_Insegura_y_Directa_a_Objetos </a></p>
	<a target="_blank" href="https://www.securityartwork.es/2010/03/30/owasp-top-10-iv-referencia-directa-a-objetos-insegura/">https://www.securityartwork.es/2010/03/30/owasp-top-10-iv-referencia-directa-a-objetos-insegura/ </a></p>
	<a target="_blank" href="https://www.owasp.org/index.php/Testing_for_Insecure_Direct_Object_References_(OTG-AUTHZ-004)">https://www.owasp.org/index.php/Testing_for_Insecure_Direct_Object_References_(OTG-AUTHZ-004) </a></p>



    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p>
		Buscar por código de artículo  :
                <form method='GET' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <select class="form-control" name="item">
                            <option value="">Seleccion de artículo</option>
                            <?php 
                            include('../../config.php');
                            if($conn1){
                                $sql= 'select itemid from caffaine LIMIT 5';
                                $stmt = $conn1->prepare($sql);
                                $stmt->execute();
                                while($rows = $stmt->fetch(PDO::FETCH_NUM)){
                                    echo "<option value=\"".$rows[0]."\">".$rows[0]."</option>";
                                }
                            } 

                            echo "</select><br>";
                            echo "<div align=\"right\"> <button class=\"btn btn-default\" type=\"submit\">Buscar</button></div>";

                            echo "</div> </form> </p>";
                            echo "</div>";
                            $item = isset($_GET['item']) ? $_GET['item'] : '';
                            $sql = "select itemcode,itemname,itemdisplay,itemdesc,categ,price from caffaine where itemid = :itemid";
                            $stmt = $conn1->prepare($sql);
                            $stmt->bindParam(':itemid',$item);
                            $stmt->execute();
                            echo "<table>";
                            while($rows = $stmt->fetch(PDO::FETCH_NUM)){
                                echo "<tr><td><b>Item Codigo : </b>".htmlspecialchars($rows[0])."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Description : </b>".htmlspecialchars($rows[3])."</td></tr>";
                                echo "<tr><td><b>Item Nombre : </b>".htmlspecialchars($rows[1])."</td></tr>";
                                echo "<td><img src='".htmlspecialchars($rows[2])."' height=130 weight=20/></td>";
                                echo "<tr><td><b>Categoria : </b>".htmlspecialchars($rows[4])."</td></tr>";
                                echo "<tr><td><b>Precio : </b>".htmlspecialchars($rows[5])."$</td></tr>"; 
                                echo "<tr><td colspan=3><hr></td></tr>";
                            }
                            echo "</table>";

                            ?>



                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <?php include_once('../../about.html'); ?>