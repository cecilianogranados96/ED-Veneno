<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Obtener cartas en mano del jugador.
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
		$id = $_POST['id'];
	}else{
		$id = $_GET['id'];
	}
	ob_start();
	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 2, strlen(2)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");
	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, $id, strlen($id)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	socket_write($socket, 77, strlen(77)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 2048) or die("Could not read server response\n");
	
	echo $result;
?>