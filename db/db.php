<?php 

$SERVER_servername = "localhost";
$SERVER_username = "root";
$SERVER_password = "";
$SERVER_dbname = "yoyodb";

// Create connection
$conn = new mysqli($SERVER_servername, $SERVER_username, $SERVER_password,$SERVER_dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{ 
	// echo "Connected successfully<br>";
}

 ?>