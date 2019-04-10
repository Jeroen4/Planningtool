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
	include ('connect.php');
	?>
	<div class="wrapper">
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

		<div class="line"></div>

		
		<form autocomplete="off">
			<h2>Maak je planning</h2>
			<p><label>Vul hier je naam in</label><input type="text" name="name" placeholder="naam..."></p>
			<p><label>Kies een spel</label><input type="text" name="game" placeholder="spelnaam..."></p>
			<p><label>Kies een uitlegger</label><input type="text" name="leader" placeholder="naam van uitlegger..."></p>
			<p><label>Vul een starttijd in</label><input type="text" name="starttime" placeholder="starttijd"></p>
			<p><label>Wie spelen er mee?</label><input type="text" name="players" placeholder="namen van spelers..."></p>
		</form>

		<div class="line2"></div>

		<div class="planner">
			
		</div>
	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>