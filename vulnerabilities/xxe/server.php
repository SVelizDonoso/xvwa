<?php

//libxml_disable_entity_loader (false);
$xmlfile = file_get_contents('php://input');
$dom = new DOMDocument();
$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
$uservalue = simplexml_import_dom($dom);
$value = $uservalue->value;

echo "<div class='alert alert-success'>Hola Amigo, Gracias por aprender con ".$value."</div>";
?>