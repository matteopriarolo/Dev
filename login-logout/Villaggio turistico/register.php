<?php
require_once __DIR__ . "/conn.php";

if ($_GET['error'] == 'invalid_credentials') {
    echo "<p style='color: red;'>Nessun utente trovato con le credenziali inserite precedentemente.</p>";

    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $cognome = isset($_GET['cognome']) ? $_GET['cognome'] : '';
    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label for="Email">Mail:</label>
        <input type="text" id="Email" name="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
        <br>
        <label for="Cognome">Cognome:</label>
        <input type="text" id="Cognome" name="Cognome" value="<?php echo isset($cognome) ? htmlspecialchars($cognome) : ''; ?>" required>
        <br>
        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>" required>
        <br>
        <label for="Psw">Password:</label>
        <input type="password" id="Psw" name="Psw" required>
        <br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>

<?php
if (isset($_POST["register"])) {
    $email = $_POST["Email"];
    $cognome = $_POST["Cognome"];
    $nome = $_POST["Nome"];
    $password = $_POST["Psw"];

    $query = "INSERT INTO users (Email, Cognome, Nome, Psw) VALUES ('$email', '$cognome', '$nome', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location: login.php");
        exit;
    } else {
        echo "<p>Registrazione fallita. Riprova.</p>";
    }
}

?>
