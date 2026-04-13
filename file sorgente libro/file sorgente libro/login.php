<?php
   $hostname = “localhost”;
   $username = “root”;
   $password = “”;
   $dbname = “dblogin”;
   
   //connessione al server SQL
   $conn = mysqli_connect($hostname, $username, $password,
   $dbname);
   if(!$conn)
    {
      print “errore nella connessione”;
      exit();
    }
   //recupera i dati passati dal form html
   $user = $_POST[‘user’];
   $psw = $_POST[‘psw’];
   if ($user == ‘’ || $psw == ‘’)
    {
      print “campi vuoti”;
      print “<br><a href=’inseriscilogin.php’>torna al login</a>”;
    }
   else
    {
     $query = “Select * from login where user = ‘$user’ && psw = ‘$psw’”;
     $risultato= mysqli_query($conn,$query);
     if (!$risultato)
      {
       print “errore nel comando”;
       exit();
      }
     $riga = mysqli_fetch_array($risultato);
     if ($riga)
      print “Benvenuto”.$riga[‘nome’].””.$riga[‘cognome’];
     else
      {
       print “username o password errate”;
       print “<br><a href='inseriscilogin.php’>torna al login</a>”;
       print “<br><a href=’inserimento.php’>registrati</a>”;
      }
     }
   mysqli_close($conn);
?>