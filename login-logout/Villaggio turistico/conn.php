<?php
    $host     = "localhost";
    $utente   = "root";
    $password = "";
    $database = "villaggi_turistici";

    $connessione = mysqli_connect($host, $utente, $password, $database);
    if (!$connessione) {
        die("Errore di connessione: " . mysqli_connect_error());
    }
?>