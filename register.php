<?php
//Connessione al database
$conn = new mysqli('localhost', 'root', '', 'user_registration');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email']; 
$password = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, email, passwordUser) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrazione avvenuta con successo!";
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

$conn->close();