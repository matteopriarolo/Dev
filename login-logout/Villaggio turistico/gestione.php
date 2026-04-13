<?php
require_once __DIR__ . "/conn.php";

session_start();

if (!isset($_SESSION["Email"]) || !isset($_SESSION["Cognome"]) || !isset($_SESSION["ID"])) {
    header("location: login.php");
    exit;
}

echo "<h1>Gestione Villaggi</h1>";

if (isset($_POST["cognome"]) && isset($_POST["nome"]) && isset($_POST["ruolo"]) && isset($_POST["ID"])) {

    $cognome = $_POST["cognome"];
    $nome = $_POST["nome"];
    $ruolo = $_POST["ruolo"];
    $villaggio = $_POST["ID"];

    // Prepared statement (sicuro)
    $stmt = $conn->prepare("INSERT INTO personale (cognome, nome, ruolo, codice_villaggio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $cognome, $nome, $ruolo, $villaggio);

    if ($stmt->execute()) {
        echo "<p>Inserimento riuscito</p>";
    } else {
        echo "<p>Errore inserimento: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

echo "<h2>Capovillaggi</h2>";

$sql1 = "SELECT cognome, nome, codice_villaggio 
         FROM personale 
         WHERE ruolo = 'capovillaggio'";

$result1 = $conn->query($sql1);

while ($row = $result1->fetch_assoc()) {
    echo $row["cognome"] . " " . $row["nome"] . 
         " - Villaggio: " . $row["codice_villaggio"] . "<br>";
}

echo "<h2>Villaggi con più di 10 contratti</h2>";

$sql2 = "SELECT v.Denominazione, v.Localita, COUNT(*) as num_contratti
         FROM villaggi v
         JOIN contratti c ON v.ID = c.id_villaggio
         WHERE c.data_fine IS NULL OR c.data_fine > CURRENT_DATE
         GROUP BY v.Denominazione, v.Localita
         HAVING COUNT(*) > 10";

$result2 = $conn->query($sql2);

while ($row = $result2->fetch_assoc()) {
    echo $row["Denominazione"] . " (" . $row["Localita"] . 
         ") - Contratti: " . $row["num_contratti"] . "<br>";
}

$conn->close();
?>