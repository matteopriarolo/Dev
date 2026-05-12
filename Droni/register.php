<!DOCTYPE html>
<html lang="it">
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
            <input type="text" id="username" name="username" required>
            <label for="ruolo">Ruolo:</label>
            <select name="ruolo" id="ruolo" require>
                <option value="amministratore">Amministratore</option>
                <option value="operatore">Operatore</option>
                <option value="pilota">Pilota</option>
            </select>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
        </form>
    </main>
    
    <br><br><br>
    <p>Hai già un account? <a href="login.php"> Accedi</a></p>
</body>
</html>
