<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php">
        <label for="nome">nome: </label>
        <input type="text" name="nome" id="nome">
        
        <label for="sesso">Sesso</label>
        <input type="text" name="sesso" id="">

        <input type="submit" value="invia">
    </form>

    <?php 
    if(isset($_GET['sesso'])){
        if($_GET['sesso'] == 'M') {
            echo "Egregio signore ";
        } else 
            echo "Gentilissima signora ";
        
        echo $_GET['nome'];
    }
        
    ?>
</body>
</html>