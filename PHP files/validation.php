<?php
$servername = "localhost:3306";
$username = "root";
$password = "Dbms1516@mu";
$db_name = "imdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "\n";

?>