<?php
	$host    = "localhost";
	$port    = 1500;
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 9, strlen(9)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 0, strlen(0)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");
	
	//echo $result;
	$cant_jugadores = $result;
?>