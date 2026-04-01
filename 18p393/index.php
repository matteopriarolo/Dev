<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "biciclette";


    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bicclette</title>
    </head>
    <body>
        <form action="index.php" method="get">
            <label for="id">id modello bicicletta:</label>
                <input type="text" id="id" name="id">
            <label for="nuovo_valore">Nuovo valore:</label>
                <input type="text" id="nuovo_valore" name="nuovo_valore">
            <input type="submit" value="Modifica">
        </form>


    </body>
    </html>

<?php

    $query = "UPDATE biciclette SET modello = '".$_GET['nuovo_valore'] . "'

    mysqli_close($conn);
?>