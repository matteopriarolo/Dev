<?php
include_once __DIR__ . "/conn.php";

session_start();

if (!isset($_SESSION["Nome"]) || !isset($_SESSION["Cognome"]) || !isset($_SESSION["ID"])) {
    header("location: login.php");
    exit;
}

$anno_attuale = date("Y");
$oggi = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Interrogazioni Villaggio</title>
</head>
<body>

<h1>1. Curriculum contratti (Matricola 1)</h1>
<?php 
$id_persona = 1;

$sql1 = "SELECT p.Nome, p.Cognome, c.data_inizio, c.data_fine, r.Nome AS Ruolo 
         FROM personale p 
         INNER JOIN contratti c ON p.ID = c.ID_personale 
         INNER JOIN ruoli r ON c.ID_ruolo = r.ID 
         WHERE p.ID = ?";

$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $id_persona);
$stmt1->execute();
$res1 = $stmt1->get_result();

while ($row = $res1->fetch_assoc()) {
    echo "<p>Persona: {$row['Nome']} {$row['Cognome']} - Ruolo: {$row['Ruolo']} (Dal: {$row['data_inizio']} Al: {$row['data_fine']})</p>";
}
?>

<h1>2. Elenco Capovillaggio iniziati nel <?php echo $anno_attuale; ?></h1>
<?php 
$sql2 = "SELECT p.Cognome, p.Nome, v.ID AS Codice_Villaggio 
         FROM personale p 
         INNER JOIN contratti c ON p.ID = c.ID_personale 
         INNER JOIN villaggi v ON v.ID = c.ID_villaggio 
         INNER JOIN ruoli r ON r.ID = c.ID_ruolo 
         WHERE r.Nome = 'Capovillaggio' 
         AND YEAR(c.data_inizio) = ?";

$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $anno_attuale);
$stmt2->execute();
$res2 = $stmt2->get_result();

while ($row = $res2->fetch_assoc()) {
    echo "<p>Nome: {$row['Nome']} {$row['Cognome']} - Codice Villaggio: {$row['Codice_Villaggio']}</p>";
}
?>

<h1>3. Villaggi con più di 10 contratti in corso</h1>
<?php 
$sql3 = "SELECT v.Denominazione, v.Localita, COUNT(c.ID) as Totale 
         FROM villaggi v 
         INNER JOIN contratti c ON v.ID = c.ID_villaggio 
         WHERE (c.data_fine IS NULL OR c.data_fine >= NOW())
         GROUP BY v.ID, v.Denominazione, v.Localita
         HAVING Totale > 10";

$res3 = $conn->query($sql3);

if ($res3->num_rows == 0) {
    echo "<p>Nessun villaggio trovato.</p>";
}

while ($row = $res3->fetch_assoc()) {
    echo "<p>Villaggio: {$row['Denominazione']} ({$row['Localita']}) - Contratti: {$row['Totale']}</p>";
}
?>

<h1>4. Personale Tedesco disponibile</h1>
<?php 
$sql4 = "SELECT Nome, Cognome 
         FROM personale 
         WHERE (Madrelingua = 'Tedesco' OR Seconda_lingua = 'Tedesco') 
         AND ID NOT IN (
            SELECT ID_personale 
            FROM contratti 
            WHERE (data_fine IS NULL OR data_fine >= NOW())
         )";

$res4 = $conn->query($sql4);

while ($row = $res4->fetch_assoc()) {
    echo "<p>Disponibile: {$row['Nome']} {$row['Cognome']}</p>";
}
?>

<h1>5. Elenco bagnini (codice 'bag') ed età</h1>
<?php 
$sql5 = "SELECT p.Nome, p.Cognome, 
                TIMESTAMPDIFF(YEAR, p.Data_nascita, CURDATE()) as Eta 
         FROM personale p 
         INNER JOIN contratti c ON p.ID = c.ID_personale 
         INNER JOIN ruoli r ON c.ID_ruolo = r.ID 
         WHERE r.Nome = 'bag'";

$res5 = $conn->query($sql5);

while ($row = $res5->fetch_assoc()) {
    echo "<p>Bagnino: {$row['Nome']} {$row['Cognome']} - Età: {$row['Eta']}</p>";
}
?>

</body>
</html>

<?php $conn->close(); ?>