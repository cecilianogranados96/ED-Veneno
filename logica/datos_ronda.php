<?php
	$host    = "localhost";
	$port    = 1500;
	if (isset($_POST['nombre'])){		
		$nombre = $_POST['nombre'];
	}else{
		$nombre = $_GET['nombre'];
	}

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("ERROR");
	$result = socket_connect($socket, $host, $port) or die("ERROR");  
	socket_write($socket, 18, strlen(18)) or die("ERROR");
	$result = socket_read ($socket, 2048) or die("ERROR");

	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("ERROR");
	$result = socket_connect($socket, $host, $port) or die("ERROR");  
	socket_write($socket, $nombre, strlen($nombre)) or die("ERROR");
	$result = socket_read ($socket, 2048) or die("ERROR");


	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("ERROR");
	$result = socket_connect($socket, $host, $port) or die("ERROR");
	socket_write($socket, 77, strlen(77)) or die("ERROR");
	$result = socket_read ($socket, 2048) or die("ERROR");
	
	
?>