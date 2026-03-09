<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
		
		$a = "ciao";
		echo var_dump($a);
		
		
		
		
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            ?>
            <form method = "POST" action = "login.php">
                Username <input name = "username" type = "text"><br>
                Password &nbsp <input name = "password" type = "password"><br><br>
                <input type = "submit" value = "Accedi">
            <?php
        }
        else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (strlen($username) != 0 && strlen($password) != 0) {
            $connection = mysqli_connect( "localhost", "root", "", "hogwarts");
            $query = "SELECT *
                      FROM utenti
                      WHERE username = '$username'";
            $result = $connection -> query($query);
            if (mysqli_num_rows($result) == 0) {
                echo "Utente $username sconosciuto: ";
                echo " <a href = \"http://localhost/hogwarts/
                login.php\">riprova.</a><br>";
            }
            else {
                $user_row = $result -> fetch_array();
                $password = crypt($password, 0);
                if ($password == $user_row['password']) {
                    echo "Password corretta: ";
                    echo " <a href = \"http://localhost/hogwarts_new.php\"> accedi.</a><br>";
                    // distruzione eventuale sessione
                    // precedente
                    session_start();
                    session_unset();
                    session_destroy();
                    // inizializzazione nuova sessione
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['start_time'] = time();
                    $_SESSION['DB_username'] =
                    $user_row['DB_username'];
                    $_SESSION['DB_password'] =
                    $user_row['DB_password'];
                    echo " <a href = \"http://localhost/hogwarts/logout.php\">[$username logout]</a>";
                }
                else {
                echo "Password errata: ";
                echo " <a href = \"http://localhost/hogwarts/login.php\"> riprova.</a>";
                }
            }
            mysqli_close($connection);
            }
            else {
                echo "Username/password non validi: ";
                echo " <a href=\"http://localhost/hogwarts/login.php\">riprova.</a>";
            }
        } ?>
    </body>
</html>