 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
      -->
      <div class="caption-full">
        <h3><a href="#">Carga de Archivos Insegura</a></h3>
        
        <p align="justify">
        Como su nombre lo indica, este problema ocurre cuando la aplicación no valida el archivo que el usuario está cargando.
        Un atacante puede cargar archivos maliciosos llamados webshells 
        en el servidor que podrían llevar a un compromiso completo del servidor. 
        </p><br><br>
        <p>Leer más de Carga de Archivos Insegura<br><br>
        <a target="_blank" href="https://www.owasp.org/index.php/Unrestricted_File_Upload">https://www.owasp.org/index.php/Unrestricted_File_Upload</a></p>
        <a target="_blank" href="https://www.owasp.org/index.php/Top_10_2007-Ejecuci%C3%B3n_de_Ficheros_Malintencionados">https://www.owasp.org/index.php/Top_10_2007-Ejecuci%C3%B3n_de_Ficheros_Malintencionados</a></p>
	<a target="_blank" href="http://www.hackplayers.com/2017/03/pentesterlab-write-up-web-for-pentester-1-upload-ldap-xml-attacks.html">http://www.hackplayers.com/2017/03/pentesterlab-write-up-web-for-pentester-1-upload-ldap-xml-attacks.html</a></p>
    </div>
      </div>

      <div class="well">
        <table width="100%" style="border-collapse:collapse; table-layout:fixed;"><tr><td>
          <div class="col-lg-12"> 
            <p><h4>Agregar nuevo artículo a la lista de café:</h4><br>
              <form method='post' action='' enctype="multipart/form-data">
                <div class="form-group"> 
                  <label></label>
                  <span class="file-input btn btn-primary btn-file">
                   Subir imagen:<input type="file" name="image">
                 </span>
                 <br><br>
                 <input class="form-control" width="50%" placeholder="Nombre Item" name="item"></input> <br>
                 <textarea class="form-control" placeholder="Descripcion" rows="3" name="desc"></textarea><br>
                 <input class="form-control" width="50%" placeholder="Categoria" name="categ"></input> <br>
                 <input class="form-control" width="50%" placeholder="Precio" name="price"></input> <br>

                 <div align="right"> <button class="btn btn-default" type="submit">Subir Artículo </button></div>

                 <br>
               </div>
             </form>
           </p>
         </div>
       </td>
       <td>
        <div class="col-lg-12"> 
          <p><h4></h4><br>

            <?php 
            
            error_reporting(E_ALL);

            $itemcode = "XVWA".rand(1000,9999);
            $itemname = isset($_POST['item']) ? $_POST['item'] : '';
            $itemdesc = isset($_POST['desc']) ? $_POST['desc'] : '';
            $categ = isset($_POST['categ']) ? $_POST['categ'] : '';
            $price = isset($_POST['price']) ? $_POST['price']: '';
            $image = isset($_POST['image']);

            if($itemname!='' && $itemdesc!='' && $categ!='' && $price!='' && basename( $_FILES['image']['name'])!=''){

              include('../../config.php');

              if(!$conn1){
                echo "Error en la conexion con la base de datos.";
              }else{

              //uploading file
                $path = $_SERVER['DOCUMENT_ROOT'].'/xvwa/img/uploads/';
                $path = $path . basename( $_FILES['image']['name']); 
                $rpath = '/xvwa/img/uploads/'.basename( $_FILES['image']['name']);
		if(!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                  echo "<h4><b><font color='red'>Se produjo un error al cargar el archivo. Inténtalo de nuevo.</font></b></h4>";
                }else{
                  
                  $stmt = $conn1->prepare("INSERT INTO caffaine (itemcode, itemname, itemdisplay, itemdesc, categ, price) VALUES (:itemcode, :itemname, :itemdisplay, :itemdesc, :categ, :price)");
                  $stmt->bindParam(':itemcode', $itemcode);
                  $stmt->bindParam(':itemname', $itemname);
                  $stmt->bindParam(':itemdisplay', $rpath);
                  $stmt->bindParam(':itemdesc', $itemdesc);
                  $stmt->bindParam(':categ', $categ);
                  $stmt->bindParam(':price', $price);
                  $stmt->execute();
                  $sql = "select itemname,itemdisplay,itemdesc,categ,price from caffaine where itemcode = :itemcode";
                  $stmt = $conn1->prepare($sql);
                  $stmt->bindParam(':itemcode',$itemcode);
                  $stmt->execute();
                  echo "<h4><b><font color='green'>¡Artículo cargado correctamente!!</font></b></h4><br>";
                  echo "<table>";
                  while($rows = $stmt->fetch(PDO::FETCH_NUM)){
                    echo "<tr><td><b>Codigo: </b>".htmlspecialchars($itemcode)."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Descripcion : </b>".htmlspecialchars($rows[2])."</td></tr>";
                    echo "<tr><td><b>Nombre : </b>".htmlspecialchars($rows[0])."</td></tr>";
                    echo "<td><img src='".htmlspecialchars($rows[1])."' height=130 weight=20/></td>";
                    echo "<tr><td><b>Categoria : </b>".htmlspecialchars($rows[3])."</td></tr>";
                    echo "<tr><td><b>Precio : </b>".htmlspecialchars($rows[4])."$</td></tr>"; 
                  }
                  echo "</table>";


                  // item uploaded

                } 
              }
            }else{
              //enter full information 
            }
            ?>
          </p>
        </div>
      </td></tr></table>
      <hr>
      
    </div>
    <?php include_once('../../about.html'); ?>
