<?php
    require_once __DIR__ . '/conn.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM utenti WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['ruolo'] = $row['ruolo'];
                header('Location: dashboard.php');
                exit;
            } else {
                echo "Password errata!";
            }
        } else {
            echo "Username non trovato!";
        }



    } else {
        echo "Per favore, inserisci username e password!";
    }
?>