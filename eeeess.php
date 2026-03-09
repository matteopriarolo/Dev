<html>
    <head>
        <title> </title>
</head>

    <body>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $pass = $_POST['pass'];
            $connection = mysqli_connect("localhost", "$username", "$pass", "classicmodels");
            if($connection){
                header("Location: eeeess2.php");
            }else echo "fallito";
        }
        ?>

        <form method="post" action="">
            <label for="username">username:</label>
            <input type="text" id="username" name="username">
        
            <label for="pass">pass:</label>
            <input type="text" id="pass" name="pass">
        
        <button type="submit">Search</button>
        </form>

</body>



</html>