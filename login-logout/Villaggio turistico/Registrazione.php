<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrazione</title>
    <style>
        
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method = "post">
        Nome: <input type="text" name = "nome"><br>
        Cognome: <input type="text" name = "cognome"><br>
        Data di nascita: <input type="date" name = "data"><br>
        Lingua: <input type="text" name = "lingua"><br>
        Seconda lingua: <input type="text" name = "seconda_lingua"><br>
        <input type="submit" name = "inv" value = "invia">
    </form>
    <?php
        if(isset($_POST["inv"])){
            include_once __DIR__ . "/conn.php";

            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $lingua = $_POST['lingua'];
            $data = $_POST['data'];
            $secondaLingua = $_POST['seconda_lingua'];
            $matricola = getMatricola($connessione);
            $sql = "INSERT INTO persona (matricola, nome,cognome, data_nascita,seconda_lingua) VALUES ('$matricola','$nome','$cognome','$data','$secondaLingua')";
            $ris = mysqli_query($connessione, $sql);
            if(!$ris){
                echo "errore nella registrazione";
            }else{
                echo "Login avvenuto con successo, Reindirizzando al sito principale...";
                session_start();
                $_SESSION['nome'] = $nome;
                $_SESSION['cognome'] = $cognome;
                $_SESSION['matricola'] = $matricola;
                header('Location: index.php');
            }
        }
    ?>
</body>
</html>

<?php
    function getMatricola($connessione){
        $sql = "SELECT matricola FROM persona ORDER BY matricola DESC";
        $riga =  $riga = mysqli_fetch_assoc(mysqli_query($connessione, $sql));
        $riga = $riga['matricola'];
        $riga = substr($riga, 1);
        $riga += 1;
        return "M".$riga;
    }
?>