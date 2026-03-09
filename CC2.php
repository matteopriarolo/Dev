<html>
<head>
<title> ContoCorrente </title>
</head>
<?php
		$CC = $_POST['CC'];
        $money = $_POST['money'];
		$tipologia = $_POST['frutta'];
        $connection = mysqli_connect( "localhost", "root", "", "ContoCorrente");
		if($tipologia == "Prelievo"){
			$queque =  "Update CONTO_CORRENTE 
						set saldo = saldo - $money 
						where numeroconto = $CC";
			$rque = mysqli_query($connection,$queque);
			if($rque){
				$query = "Select * from CONTO_CORRENTE";
				$result = mysqli_query($connection,$query);
				echo "<table>
				<tr>
				<th>N.Conto</th>
				<th>Saldo</th>
				<th>Nominativo</th>
				</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>
					<td> $row[numeroconto]</td>
					<td> $row[saldo]</td>
					<td> $row[nominativo]</td>
					</tr>";
				}
				echo "</table>";
			}
		} else{
			$queque =  "Update CONTO_CORRENTE 
						set saldo = saldo + $money 
						where numeroconto = $CC";
			$rque = mysqli_query($connection,$queque);
			if($rque){
				$query = "Select * from CONTO_CORRENTE";
				$result = mysqli_query($connection,$query);
				echo "<table>
				<tr>
				<th>N.Conto</th>
				<th>Saldo</th>
				<th>Nominativo</th>
				</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>
					<td> $row[numeroconto]</td>
					<td> $row[saldo]</td>
					<td> $row[nominativo]</td>
					</tr>";
				}
				echo "</table>";
		}
		
		
		mysqli_close($connection);
	}

?>

</body>



<html>