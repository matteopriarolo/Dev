<?php
session_start();
include_once __DIR__ . "/conn.php";


$query_attiva = isset($_POST['query']) ? $_POST['query'] : header("Location: login.php");
$matricola    = isset($_POST['matricola']) ? $_POST['matricola'] : header("Location: login.php");

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Personale Villaggi Turistici</title>
</head>
<body>

<h1> Personale Villaggi Turistici, ciao <?php echo $_SESSION['nome']. " ".$_SESSION['cognome']?></h1>

<form action="index.php" method = "post">
    <input type = "submit" value = "curriculum" name = "query">
    <input type = "submit" value = "capiv" name = "query">
    <input type = "submit" value = "villaggi_attivi" name = "query">
    <input type = "submit" value = "tedesco_disponibili" name = "query">
    <input type = "submit" value = "bagnini" name = "query">
</form>

<?php

if ($query_attiva == 'curriculum') {
    echo '<h2>1. Curriculum contratti di una persona</h2>';
    echo '<div class="descrizione">Inserisci la matricola per visualizzare tutti i contratti (conclusi o in corso) della persona.</div>';

    echo '<form method="post">';
    echo '<input type="hidden" name="query" value="curriculum">';
    echo 'Matricola: <input type="text" name="matricola" value="' . $matricola . '" placeholder="es. M001">';
    echo ' <input type="submit" value="Cerca">';
    echo '</form>';

    if ($matricola != '') {
        $sql = "
            SELECT
                p.matricola,
                p.cognome,
                p.nome,
                c.id          AS id_contratto,
                f.descrizione AS figura,
                v.denominazione,
                v.localita,
                c.data_inizio,
                c.data_fine
            FROM contratto c
            JOIN persona  p ON c.matricola        = p.matricola
            JOIN figura   f ON c.codice_figura     = f.codice
            JOIN villaggio v ON c.codice_villaggio = v.codice
            WHERE p.matricola = '$matricola'
            ORDER BY c.data_inizio DESC
        ";
        $risultato = mysqli_query($connessione, $sql);
        if (!$risultato) { die("Errore query: " . mysqli_error($connessione)); }

        if (mysqli_num_rows($risultato) > 0) {
            creaTabella($risultato);
        } else {
            echo '<p class="nessun-dato">Nessun contratto trovato per la matricola <strong>' . $matricola . '</strong>.</p>';
        }
    }
}

if ($query_attiva == 'capiv') {
    echo '<h2>2. Capovillaggio con contratto iniziato nell\'anno corrente</h2>';
    echo '<div class="descrizione">Elenco dei capovillaggio (cognome, nome e codice villaggio) che hanno iniziato il contratto nel corso dell\'anno in corso.</div>';

    $sql = "
        SELECT
            p.cognome,
            p.nome,
            v.codice   AS codice_villaggio,
            v.denominazione,
            c.data_inizio
        FROM contratto c
        JOIN persona   p ON c.matricola        = p.matricola
        JOIN figura    f ON c.codice_figura     = f.codice
        JOIN villaggio v ON c.codice_villaggio  = v.codice
        WHERE f.codice = 'cap'
          AND YEAR(c.data_inizio) = YEAR(CURDATE())
        ORDER BY p.cognome, p.nome
    ";
    $risultato = mysqli_query($connessione, $sql);
    if (!$risultato) { die("Errore query: " . mysqli_error($connessione)); }

    if (mysqli_num_rows($risultato) > 0) {
        creaTabella($risultato);
    } else {
        echo '<p class="nessun-dato">Nessun capovillaggio trovato con contratto iniziato nell\'anno corrente.</p>';
    }
}

if ($query_attiva == 'villaggi_attivi') {
    echo '<h2>3. Villaggi con più di 10 contratti in corso</h2>';
    echo '<div class="descrizione">Denominazione e località dei villaggi che hanno attualmente più di 10 contratti attivi.</div>';

    $sql = "
        SELECT
            v.codice,
            v.denominazione,
            v.localita,
            COUNT(c.id) AS num_contratti
        FROM villaggio v
        JOIN contratto c ON c.codice_villaggio = v.codice
        WHERE c.data_inizio <= CURDATE()
          AND c.data_fine   >= CURDATE()
        GROUP BY v.codice, v.denominazione, v.localita
        HAVING COUNT(c.id) > 10
        ORDER BY num_contratti DESC
    ";
    $risultato = mysqli_query($connessione, $sql);
    if (!$risultato) { die("Errore query: " . mysqli_error($connessione)); }

    if (mysqli_num_rows($risultato) > 0) {
        creaTabella($risultato);
    } else {
        echo '<p class="nessun-dato">Nessun villaggio supera i 10 contratti attivi al momento.</p>';
    }
}

if ($query_attiva == 'tedesco_disponibili') {
    echo '<h2>4. Persone tedesecofonıe disponibili (senza contratto attivo)</h2>';
    echo '<div class="descrizione">Cognome e nome delle persone che parlano tedesco come madrelingua o seconda lingua e che non hanno contratti in corso.</div>';

    $sql = "
        SELECT p.cognome, p.nome, p.madrelingua, p.seconda_lingua
        FROM persona p
        WHERE (p.madrelingua = 'tedesco' OR p.seconda_lingua = 'tedesco')
          AND p.matricola NOT IN (
              SELECT c.matricola
              FROM contratto c
              WHERE c.data_inizio <= CURDATE()
                AND c.data_fine   >= CURDATE()
          )
        ORDER BY p.cognome, p.nome
    ";
    $risultato = mysqli_query($connessione, $sql);
    if (!$risultato) { die("Errore query: " . mysqli_error($connessione)); }

    if (mysqli_num_rows($risultato) > 0) {
        creaTabella($risultato);
    } else {
        echo '<p class="nessun-dato">Nessuna persona tedescofona disponibile al momento.</p>';
    }
}

if ($query_attiva == 'bagnini') {
    echo '<h2>5. Bagnini e bagnine (con età)</h2>';
    echo '<div class="descrizione">Cognome, nome ed età di tutte le persone che hanno lavorato o stanno lavorando come bagnini (codice figura = "bag").</div>';

    $sql = "
        SELECT DISTINCT
            p.cognome,
            p.nome,
            TIMESTAMPDIFF(YEAR, p.data_nascita, CURDATE()) AS eta
        FROM persona p
        JOIN contratto c ON c.matricola    = p.matricola
        JOIN figura    f ON c.codice_figura = f.codice
        WHERE f.codice = 'bag'
        ORDER BY p.cognome, p.nome
    ";
    $risultato = mysqli_query($connessione, $sql);
    if (!$risultato) { die("Errore query: " . mysqli_error($connessione)); }

    if (mysqli_num_rows($risultato) > 0) {
        creaTabella($risultato);
    } else {
        echo '<p class="nessun-dato">Nessun bagnino o bagnina trovato.</p>';
    }
}

if ($query_attiva == '') {
    echo '<p>Seleziona una delle interrogazioni dal menu in alto per visualizzare i risultati.</p>';
}
?>

</body>
</html>
<?php
function creaTabella($query)
{
    if ($query == NULL || mysqli_num_rows($query) === 0) {
        echo ("Nessun dato trovato per ora...");
        return;
    }
    echo "<table>";
    $riga = mysqli_fetch_assoc($query);
    echo "<tr>";
    foreach ($riga as $chiave => $valore) {
        echo "<th>" . $chiave . "</th>";
    }
    echo "</tr>";

    while ($riga) {
        echo "<tr>";
        foreach ($riga as $val)
            echo "<td>" . $val . "</td>";
        echo "</tr>";
        $riga = mysqli_fetch_assoc($query);
    }
    echo "</table>";
}
?>