 

<div class="thumbnail">

    <div class="caption-full">
        <h3><a href="#">Inyección de Fórmula en CSV</a></h3>
        
        <p align="justify">
            La inyección de Fórmulario CSV también se conoce como CSV Excel inyección Macro. Esto sucede cuando la aplicación no valida el contenido del archivo CSV. Aplicaciones 
	    permiten exportar / descargar datos en formato CSV o Excel generalmente vulnerables a dichos ataques. </p><br><br>
            <p>Leer más de la Inyección de fórmula CSV <br><br>
                <a target="_blank" href="https://www.owasp.org/index.php/CSV_Excel_Macro_Injection">https://www.owasp.org/index.php/CSV_Excel_Macro_Injection</a></p>
		<a target="_blank" http://www.exploresecurity.com/from-csv-to-cmd-to-qwerty/">http://www.exploresecurity.com/from-csv-to-cmd-to-qwerty/</a></p>

            </p>
            <p>
             Sugerencia: encuentre una forma de crear o actualizar un elemento con su carga útil 
          </p>

    </div>

</div>

<div class="well">
    
        <p>
            <form method='post' action='export.php'>
                <div class="form-group"> 
                    <label></label>
                    <div class="form-group" align="right"> 
                        <button class="btn btn-primary" name="action" value="export" type="submit">Exportar a CSV</button>
                    </div>
                    <div>
                        <br>
                    <?php

                       

                        include('../../config.php');
                          
                            if($conn){
                                $stmt = $conn1->prepare("SELECT itemcode,itemname,categ,price from caffaine");
                                $stmt->execute();
                                echo "<table class='table table-striped'>";
                                echo "<tr><th>Cod Item</th><th>Item Nombre</th><th>Categoria</th><th>Precio</th></tr>";
                                while($rows=$stmt->fetch(PDO::FETCH_NUM)){
                                    echo "<tr>";
                                    echo "<td>".htmlspecialchars(utf8_decode ($rows[0]))."</td>";
                                    echo "<td>".htmlspecialchars(utf8_decode ($rows[1]))."</td>"; 
                                    echo "<td>".htmlspecialchars(utf8_decode ($rows[2]))."</td>";
                                    echo "<td>$".htmlspecialchars(utf8_decode ($rows[3]))."</td>";
                                    echo "</tr>"; 
                                }
                            }
                            echo "</table>";
                            
                            #$action = isset($_POST['action']) ? $_POST['action'] : '';
                            
                            

                            ?>
                        </div>
                        <hr>
                </div>
            </form>
        </p>
  
</div>

<?php include_once('../../about.html'); ?>