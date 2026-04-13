<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="Email">Mail:</label>
        <input type="text" id="Email" name="Email" required>
        <br>
        <label for="Cognome">Cognome:</label>
        <input type="text" id="Cognome" name="Cognome" required>
        <br>
        <label for="Psw">Password:</label>
        <input type="password" id="Psw" name="Psw" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>


<?php
require_once __DIR__ . "/conn.php";

session_start();



if (isset($_POST["login"])) {
    $email = $_POST["Email"];
    $password = $_POST["Psw"];

    $query = "SELECT * FROM users WHERE Email = '$email' AND Psw = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["Cognome"] = $row["Cognome"];
        $_SESSION["ID"] = $row["ID"];
        header("location: gestione.php");
        exit;
    } else {
        echo "<p>Login fallito. Riprova.</p>";
    }
}
?>