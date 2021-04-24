<?php
$servername = "localhost";
$database = "dro_gestion";
$username = "testing";
$password = "sistemas2166";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'testing');
define('DB_PASSWORD', 'sistemas2166');
define('DB_NAME', 'dro_gestion');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>