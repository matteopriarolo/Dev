<html>
    <head>
        <title> </title>
    <style>
        table{
            border: 2px solid black;
        }

        th, td {
            border: 2px solid moccasin;
            text-align: center;
        }
        th {
            background-color:rgba(248, 237, 172, 0.93);
        }
    </style>
    </head>

    <body>
        <?php
            $connection = mysqli_connect("localhost", "root", "", "classicmodels");
            $queque = "show tables";
            $r = mysqli_query($connection, $queque);
            mysqli_close($connection);
        ?>

        <form method="post" action="">
            <select name="tabella" id="tabella">
                <option value="">-- Seleziona una tabella --</option>
            <?php
                if(mysqli_num_rows($r) != 0){
                    while ($row = mysqli_fetch_array($r)) {
                        echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
                    }
                } 
                ?>
                </select>
                <button type="submit">Mostra</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $tabella = $_POST['tabella'];
                $connection2 = mysqli_connect("localhost", "root", "", "classicmodels");
                $quecol ="show columns from " . $tabella;
                $queque2 = "select * from " . $tabella;
                $rcol = mysqli_query($connection2, $quecol);
                $r2 = mysqli_query($connection2, $queque2);
                if(mysqli_num_rows($r2) != 0){
                    //colonne
                    echo '<table>';
                    echo "<tr>";
                    while ($col = mysqli_fetch_array($rcol)){
                        echo "<th>" . $col['Field'] . "</th>";
                    }
                    echo "</tr>"; 
                    while ($row = mysqli_fetch_assoc($r2)) {
                        echo "<tr>"; //riga
                        foreach ($row as $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                
                }
                mysqli_close($connection2);
            }
        ?>
</body>



</html>