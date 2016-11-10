<?php
	$ruta = 'http://www.sistemasdetiempo.com/files/descargas/'.$file;
	header ("Content-Disposition: attachment; filename=".$file); 
	header ("Content-Type: application/octet-stream"); 
	header ("Content-Length: ".filesize($ruta)); 
	readfile($ruta); 
?>