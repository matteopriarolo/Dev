<?php
    include_once __DIR__ . "/conn.php";

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php

        $query = "SELECT * FROM users";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Email'] . " " . $row['Cognome'] . "<br>";
        }
    ?>
</body>
</html>