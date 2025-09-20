<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "biblioteca_online";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}
?>
