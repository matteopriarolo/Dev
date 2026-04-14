<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="CF">CF:</label>
        <input type="text" id="CF" name="CF" maxlength="16" required>
        <br>
        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required>
        <br>
        <label for="Cognome">Cognome:</label>
        <input type="text" id="Cognome" name="Cognome" required>
        <br>
        <label for="Password">Password:</label>
        <input type="Password" id="Password" name="Password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>