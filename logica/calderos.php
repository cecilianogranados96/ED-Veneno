<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Obtener cartas de los calderos.
#
# Parametros:
# ===========
# -id
#
# Desarrollo:
# 
# - Jose Andres Ceciliano Granados
#
#
#########################################################################################
	$host    = "localhost";
	$port    = 1500;
	if (isset($_POST['id'])){		
		$caldero = $_POST['id'];
	}else{
		$caldero = $_GET['id'];
	}
	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 4, strlen(4)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  	
	socket_write($socket, $caldero, strlen($caldero)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");
	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  	
	socket_write($socket, 0, strlen(0)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");
	
	echo $result;
?>