<?php
   $hostname = “localhost”;
   $username = “root”;
   $password = “”;
   $dbname = “dblogin”;
   //connessione al server SQL
   $conn = mysqli_connect($hostname, $username, $password,$dbname);
   if (!$conn) {
     print “errore nella connessione”;
     exit();
    }
   //recupera i dati passati dal form html
   $user = $_POST[‘user’];
   $psw = $_POST[‘psw’];
   $nome = $_POST[‘nome’];
   $cognome = $_POST[‘cognome’];
   $query = “INSERT INTO login (‘cognome’, ‘nome’, ‘user’,‘psw’)
   VALUES (‘$cognome’, ‘$nome’, ‘$user’, ‘$psw’)”;
   $risultato = mysqli_query($conn,$query);
   if (!$risultato)
     print “errore nell’inserimento: username già presente”;
   else
     print “registrazione avvenuta correttamente”;
   mysqli_close($conn);
?>
