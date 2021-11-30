<?php
$servername = "localhost";
$database = "controleacademico";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

mysqli_close($conn);
?>