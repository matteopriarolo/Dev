<!DOCTYPE html>
<html>
<head>
<title> Es31 </title>
<style>
	table, th, td {
		border: 1px solid black;
		border-collapse : collapse;
		text-allign: center;
	}
	table {
		width: 90%;
	}
	td,td {
		width: 7%;
	}
</style>

</head>

<body>
<table>
<?php
for ($i = 0; $i<=12; $i++) {
	echo "<tr>"; 
		for ($j = 0; $j<=12; $j++) {
			if($i==0 || $j==0){
				$tagOpen = "<th style: 'width=20%'";
				$tagClose = "</th";
				if($i == 0 && $j==0) $ris=" per ";
				else $ris = ($j) * ($i==0) + ($i)*($j==0);}
			else{
				$tagOpen = "<td align:'center'>";
				$tagClose = "</td>";
				$ris = ($j) * ($i);
			}
	
		echo $tagOpen." ..  ".$ris." .. ".$tagClose;}
	echo " </tr>";
	}

?>
</table>
</body>
</html>


