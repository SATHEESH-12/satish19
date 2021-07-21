<?php
$servername = "localhost";
$username = "id17245255_satish";
$password = "{7TCDHsK7Y/emuc";
$dbname="id17245255_bankusers";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>