<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$password = $_POST["password"];
$conferma = $_POST["conferma"];

if($password == $conferma)
{
    echo "<h2>Dati inseriti</h2>";

    echo "<table border='1'>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Password</th>
            </tr>

            <tr>
                <td>$nome</td>
                <td>$email</td>
                <td>$password</td>
            </tr>

          </table>";
}
else
{
    echo "<h2>Errore</h2>";
    echo "Le password inserite non coincidono!";
}

?>