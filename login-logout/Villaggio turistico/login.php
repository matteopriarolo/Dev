<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method = "post">
        Nome: <input type="text" name = "nome"><br>
        Cognome: <input type="text" name = "cognome"><br>
        Matricola: <input type="text" name = "matricola"><br>
        <input type="submit" name = "inv" value = "invia">
    </form>
    <?php
        if(isset($_POST["inv"])){
            
            include_once __DIR__ . "/conn.php";


            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $matricola = $_POST['matricola'];

            $sql = "SELECT * FROM persona WHERE nome = '$nome' AND cognome = '$cognome' AND matricola = '$matricola'";
            $riga = mysqli_fetch_assoc(mysqli_query($connessione, $sql));
            if(!$riga){
                echo "errore nel login";
            }else{
                echo "Login avvenuto con successo, Reindirizzando al sito principale...";
                session_start();
                $_SESSION['nome'] = $nome;
                $_SESSION['cognome'] = $cognome;
                $_SESSION['matricola'] = $matricola;
                header('Location: villaggioTuristicoLogin.php');
            }
        } 
    ?>
</body>
</html>