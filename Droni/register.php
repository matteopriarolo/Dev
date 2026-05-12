<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="index.css">

</head>
<body class="center">
    <header>
        <h1>Registrati!</h1>
    </header>

    <main>
        <form action="register_auth.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="ruolo">Ruolo:</label>
            <input type="text" id="ruolo" name="ruolo" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Register">
        </form>
    </main>
    
    <br><br><br>
    <p>Hai già un account? <a href="login.php"> Accedi</a></p>
</body>
</html>
