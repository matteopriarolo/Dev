<?php

$autore = $_POST["autore"];
$titolo = $_POST["titolo"];

if(isset($_POST["genere"])) {
    $generi = $_POST["genere"];

    // unisce le categorie in una stringa separata da virgole
    $lista_generi = implode(", ", $generi);
} else {
    $lista_generi = "Nessun genere selezionato";
}

echo "<h2>Dati inseriti</h2>";

echo "Autore: " . $autore . "<br>";
echo "Titolo: " . $titolo . "<br>";
echo "Generi: " . $lista_generi;

?>