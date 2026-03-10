<?php

if(isset($_POST["animale"]))
{
    $animali = $_POST["animale"];

    echo "<h2>Animali selezionati:</h2>";

    echo "<ul>";

    foreach($animali as $a)
    {
        echo "<li>" . $a . "</li>";
    }

    echo "</ul>";
}
else
{
    echo "Nessun animale selezionato.";
}

?>