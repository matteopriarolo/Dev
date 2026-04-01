<?php
    $conn = mysqli_connect("localhost", "root", "", "biciclette");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM modelli";
    $risultato = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="5">
        <tr>
            <th>Numero</th>
            <th>Denominazione</th>
            <th>Prezzo</th>
            <th>CodiceCostruttore</th>
        </tr>

        <?php while ($riga = mysqli_fetch_assoc($risultato)) { ?>
            <tr>
                <td><?= $riga['Numero'] ?></td>
                <td><?= $riga['Denominazione'] ?></td>
                <td><?= $riga['Prezzo'] ?></td>
                <td><?= $riga['CodiceCostruttore'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>