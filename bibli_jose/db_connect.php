<?php
	
	$con = new mysqli('localhost', 'root', '1234', 'bibliotecas');
	$con->set_charset("utf8");
	
	if(!$con)
		die("ERROR: Couldn't connect to database");
?>