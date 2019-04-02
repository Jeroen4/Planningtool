<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
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
				echo $row['name'];
				echo "<br>";
			}
		?>
	</div>
</body>
</html>