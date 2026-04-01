<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conti_bancari";


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die ("connessione fallita" . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banck</title>
</head>
<body>
    <h1>Filtra movimenti da data a data</h1>
    <form action="index.php?filtra_data=true" method="post" style="display:flex; flex-direction:column; width:200px;">
        <label for="da_data">Da:</label>
            <input type="date" id="da_data" name="da_data" required>
        <label for="a_data">A:</label>
            <input type="date" id="a_data" name="a_data" required>
        <label for="conto">Inserisci il numero di conto:</label>
            <input type="number" id="conto" name="conto" required>
        <br>
        <input type="submit" value="Invia">
    </form>
    <br><br>


    <h1>Filtra movimenti con causale "imposta" o "imposte"</h1>
    <form action="index.php?filtra_causale=true" method="post" style="display:flex; flex-direction:column; width:200px;">
        <input type="text" name="conto" placeholder="Inserisci il tuo numero di conto" required>
        <br>
        <input type="submit" value="Invia">
    </form>
    <br><br>


    <h1>Filtra movimenti con importo maggiore di</h1>
    <form action="index.php?filtra_importo=true" method="post" style="display:flex; flex-direction:column; width:200px;">
        <input type="text" name="conto" placeholder="Inserisci il tuo numero di conto" required>
        <input type="text" name="importo" placeholder="Inserisci l'importo" required>
        <br>
        <input type="submit" value="Invia">
    </form>
    <br><br>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conto = $_POST['conto'];

    if($_GET['filtra_data'] == true) {
        $da_data = $_POST['da_data'];
        $a_data = $_POST['a_data'];

        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND DataRegistrazione >= '$da_data'
            AND DataRegistrazione <= '$a_data'
        ";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "<p>Errore nella query: " . mysqli_error($conn) . "</p>";
            exit;
        }
    } else if ($_GET['filtra_causale'] === true) {

        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND (Causale = 'imposta' OR Causale = 'imposte')
        ";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "<p>Errore nella query: " . mysqli_error($conn) . "</p>";
            exit;
        }
    } else if ($_GET['filtra_importo'] === true) {
        $importo = $_POST['importo'];

        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND Importo > '$importo'
        ";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "<p>Errore nella query: " . mysqli_error($conn) . "</p>";
            exit;
        }
    } else {
        echo "<p>Errore: nessun filtro selezionato.</p>";
    }

    while($row = mysqli_fetch_assoc($result)) {

            $tipo = $row['Credito'] ? '<p style="color:green;">+' : '<p style="color:red;">-';

            echo "<div style='border:1px solid black; padding:10px; margin-bottom:10px;'>";
            echo "<h2>ID: {$row['ID']} </p> </h2>";
            echo "<p>Importo: {$tipo}{$row['Importo']} </p> </p>";
            echo "<p>Data: {$row['DataRegistrazione']} </p> </p>";
            echo "</div>";
        }
}
?>