<!DOCTYPE html>
<html>
<head>
<title> es </title>

</head>

<body>

<?php

	$connection = mysqli_connect("localhost", "root", "", "5bi");
	
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$nome = $_POST['Banana'];
			
			$queque = "select Nome, Materia from alunni where nome = '$nome'";
			if(mysqli_query($connection, $queque)){
				$r=mysqli_query($connection,$queque);
				$row = mysqli_fetch_array($r);
				echo "la materia preferita di ".$nome."è ".$row['Materia'];
				echo "Successo";
			} else{ echo "Fallimento";
			}
			mysqli_close($connection);
		}
			
		
?>

	<form method="post" action="">
        <label for="Banana">nome:</label>
        <input type="text" id="Banana" name="Banana">
        <button type="submit">AAAAA</button>
    </form>

	
	
</body>
</html>


