<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Regresar jugadores en la mano.
#
# Parametros:
# ===========
#
#
# Desarrollo:
# 
# - Jose Andres Ceciliano Granados
#
#
#########################################################################################
	$host    = "localhost";
	$port    = 1500;
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("ERROR");

	$result = socket_connect($socket, $host, $port) or die("<script>window.location='index.php'</script>");
	socket_write($socket, 9, strlen(9))or die("<script>window.location='index.php'</script>");
	$result = socket_read ($socket, 2048) or die("<script>window.location='index.php'</script>");

	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("ERROR");
	$result = socket_connect($socket, $host, $port) or die("ERROR");
	socket_write($socket, 0, strlen(0)) or die("ERROR");
	$result = socket_read ($socket, 2048) or die("ERROR");
	
	//echo $result;
	$cant_jugadores = $result;

?>