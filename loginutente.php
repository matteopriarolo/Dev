<html>
<head>
<title> Login </title>
</head>

<body>


	<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']?>">
    username
	<input type="text" id="banana" name="banana"><br>
	Password <input type="text" id="frigo" name="frigo"><br><br>
    <input type = "submit" value = "Accedi">
	</form>








<?php
		$username = $_POST('banana');
        $password = $_POST('frigo');
        $connection = mysqli_connect( "localhost", "root", "", "classicmodels");
        $query = "show grants for '$username'";
		$result = mysqli_query($connection,$query);
		echo $result
?>

</body>



<html>