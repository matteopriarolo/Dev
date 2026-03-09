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
			$cognome = $_POST['Frigo'];
			$materia = $_POST['Patata'];
			
			
			$queque = "Insert into alunni(Nome, Cognome, Materia) values ('$nome', '$cognome', '$materia')";
			if(mysqli_query($connection, $queque)){
				
				echo "Successo";
			} else{ echo "Fallimento";
			}
			mysqli_close($connection);
		}
			
		
?>

	<form method="post" action="">
        <label for="Banana">nome:</label>
        <input type="text" id="Banana" name="Banana">
		<label for="Frigo">cognome:</label>
        <input type="text" id="Frigo" name="Frigo">
        <select required name="Patata">
			<?php
			$connection = mysqli_connect("localhost", "root", "", "5bi");
			$queque = "select * from favmateria";
			$r = mysqli_query($connection, $queque);
                while($row = mysqli_fetch_array($r)){
					echo '<option value="'.$row['codMateria'].'">'.$row['Materia'].'</option>';
				}
				
			mysqli_close($connection);
				
			?>
			</select>
        <button type="submit">AAAAA</button>
    </form>

	
	
</body>
</html>


