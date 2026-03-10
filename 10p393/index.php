<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php">
        <label for="euro">euro:</label>
        <input type="number" name="euro" id="">

        <input type="submit" value="calcola">
    </form>
    

    <?php
        if(isset($_GET['euro']))
            echo "Dollari: " . $_GET['euro'] * 1.31;
    ?> 
</body>
</html>