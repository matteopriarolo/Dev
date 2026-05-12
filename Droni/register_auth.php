<?php
    require_once __DIR__ . '/conn.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['ruolo'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $ruolo = $_POST['ruolo'];

        require_once __DIR__ . '/login_auth.php';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utenti (username, password, ruolo) VALUES ('$username', '$hashed_password', '$ruolo')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            header("Location: register.php?error=1");
            exit();
        }
    }
?>