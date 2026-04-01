if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conto = $_POST['conto'];

    // FILTRO PER DATA
    if (isset($_GET['filtra_data'])) {

        $da_data = $_POST['da_data'];
        $a_data = $_POST['a_data'];

        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND DataRegistrazione >= '$da_data'
            AND DataRegistrazione <= '$a_data'
        ";

    // FILTRO CAUSALE
    } elseif (isset($_GET['filtra_causale'])) {

        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND (Causale = 'imposta' OR Causale = 'imposte')
        ";

    // FILTRO IMPORTO
    } elseif (isset($_GET['filtra_importo'])) {

        $importo = $_POST['importo'];
        
        $sql = "
            SELECT * 
            FROM movimenti 
            WHERE NumeroConto = '$conto'
            AND Importo > '$importo'
        ";

    } else {
        echo "<p>Errore: nessun filtro selezionato.</p>";
        exit;
    }

    // ESECUZIONE QUERY
    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo "<p>Errore nella query: " . mysqli_error($conn) . "</p>";
        exit;
    }

    // VISUALIZZAZIONE RISULTATI
    while($row = mysqli_fetch_assoc($result)) {

        $colore = $row['Credito'] ? "green" : "red";
        $segno  = $row['Credito'] ? "+" : "-";

        echo "<div style='border:1px solid black; padding:10px; margin-bottom:10px;'>";
        echo "<h2>ID: {$row['ID']}</h2>";
        echo "<p style='color:$colore;'>Importo: $segno{$row['Importo']}</p>";
        echo "<p>Data: {$row['DataRegistrazione']}</p>";
        echo "</div>";
    }
}