<?php
$host    = "localhost";
$port    = 1500;
$message = "LO LOGRE";
echo "Message To server :".$message;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
// send string to server
if($result) { 
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
// get server response

$result = socket_read ($socket, 2048) or die("Could not read server response\n");
}

echo "<br>Reply From Server  :".$result ."<br>";

// close socket
//socket_close($socket);

?>