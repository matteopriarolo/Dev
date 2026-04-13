<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "villaggio_turistico";
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die ("errore di connessione");
}
?>