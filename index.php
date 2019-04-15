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
	include ('datalayer.php');
	?>
	<div class="wrapper">
		<div class="lijst">
			<h2>Lijst met spellen</h2>
			<?php 
				$query = $conn->prepare( 'Select * FROM games');
				$query->execute();
				$result = $query->fetchAll();

				foreach ($result as $row) {
					printf ("<a href='dataGames.php?id=".$row['id']."'>".$row['name']."</a>");
					printf ("<br>");
				}
			?>
		</div>

		<div class="line"></div>
		
		<form autocomplete="off" action="planning.php" method="post">
			<h2>Maak je planning</h2>
			<p><label>Vul hier je naam in</label><input type="text" name="naam" placeholder="naam..."></p>
			<p><label>Kies een spel</label>
				<select id="chooseGame" name="spel">
					<option value="">...</option>
					<?php 
					 	foreach ($result as $array) {
	                      printf('<option value="'. $array["id"].'">'. $array["name"] . '</option>');
                        } 
                     ?>
				 </option>
				</select></p>
			<p><label>Kies een uitlegger</label><input type="text" name="leider" placeholder="naam van uitlegger..."></p>
			<p><label>Vul een starttijd in</label><input type="time" name="starttijd" placeholder="starttijd"></p>
			<p><label>Wie spelen er mee?</label><input type="text" name="spelers" placeholder="namen van spelers..."></p>
			<p><label>Vul een datum in</label><input type="date" name="datum" placeholder="datum"></p>
			<button type="submit" name="button" class="btn" onclick="">Versturen</button><?php InsertAppointment() ?><!-- create function to submit -->
		</form>

		<div class="line2"></div>

		<div class="planner">
			<h2>Planning</h2>
			<?php include 'planning.php'; ?>
			<button class="update_btn" onclick="">Wijzigen</button>
		</div>

	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>