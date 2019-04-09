<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	include ('header.php');
	?>
	<form autocomplete="off">
		<input type="text" name="name" placeholder="naam...">
		<input type="text" name="age" placeholder="leeftijd...">
		<input type="text" name="game" placeholder="kies een spel...">
		<input type="text" name="leader" placeholder="naam van uitlegger...">
		<input type="text" name="starttime" placeholder="starttijd">
		<input type="text" name="players" placeholder="namen van spelers...">
	</form>
	<?php 
		include ('connect.php');
	?>

	<h3>Lijst met spellen</h3>
	<div class="lijst">

		<?php 
			$query = $conn->prepare( 'Select * FROM games');
			$query->execute();
			$result = $query->fetchAll();

			foreach ($result as $row) {
				printf ("<a href='data.php?id=".$row['id']."'>".$row['name']."</a>");
				printf ("<br>");
			}
		?>
	</div>

	<div class="planner">
		
	</div>
</body>
</html>