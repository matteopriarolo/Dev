<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body class="center">
    <header class="header">
        <h1 class="title">Login</h1>
    </header>

    <main>
        <form action="login_auth.php" method="post" class="user-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <br><br><br>
        <a href="register.php">Registrati</a>
    </main>
    
</body>
</html>