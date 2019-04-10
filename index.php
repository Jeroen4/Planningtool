<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="indexFlexBody">
	<?php 
	include ('header.php');
	?>
	<div class="wrapper">
		<form autocomplete="off">
			<input type="text" name="name" placeholder="naam...">
			<input type="text" name="game" placeholder="kies een spel...">
			<input type="text" name="leader" placeholder="naam van uitlegger...">
			<input type="text" name="starttime" placeholder="starttijd">
			<input type="text" name="players" placeholder="namen van spelers...">
		</form>
		<?php 
			include ('connect.php');
		?>

		
		<div class="lijst">
			<h2>Lijst met spellen</h2>
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
	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>