<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица умножения</title>
	<style>
		table, td {
	    	border: 1px solid black;
	    	border-collapse: collapse;
	    	border-spacing: 5px;
		}

		td {
	    	padding: 15px;
		}
	</style>
</head>
<body>
	<?php

	$cols = 10;
	$rows = 10;
	$backgroundColor = "yellow";
	$color = "cyan";

	echo "<table>";

	for($tr = 1; $tr <= $rows; $tr++){
		echo "<tr>";
			for($td = 1; $td <= $cols; $td++){
				if($tr == 1 || $td == 1){
					echo "<td style='font-weight: bold; text-align: center; background: $backgroundColor'>";
					echo $tr * $td;
					echo "</td>";
				}else{
					echo "<td style='background-color: $color'>";
					echo $tr * $td;
					echo "</td>";
				}
				
			}
		echo "</tr>";
	}

	echo "</table>";

	?>
</body>
</html>

