<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=xvwa-export.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('CodItem', 'ItemNombre', 'Categoria','Precio'));

include('../../config.php');  

if($conn){
     $stmt = $conn1->prepare("SELECT itemcode,itemname,categ,price from caffaine");
     $stmt->execute();
     while ($row=$stmt->fetch(PDO::FETCH_NUM)) fputcsv($output, $row);                        
                                
 }
?>