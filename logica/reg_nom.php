<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Registrar nombre de usuario.
#
# Parametros:
# ===========
# -nombre
#
# Desarrollo:
# 
# - Jose Andres Ceciliano Granados
#
#
#########################################################################################
	$host    = "localhost";
	$port    = 1500;
	if (isset($_POST['nombre'])){		
		$nombre = $_POST['nombre'];
	}else{
		$nombre = $_GET['nombre'];
	}

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 1, strlen(1)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");

	
	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, $nombre, strlen($nombre)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");

	
	echo $result;

?>