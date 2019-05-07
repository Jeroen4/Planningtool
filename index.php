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
				$query = $conn->prepare('Select * FROM games');
				$query->execute();
				$result = $query->fetchAll();

				foreach ($result as $row) {
					printf ("<a href='dataGames.php?id=".$row['id']."'>".$row['name']."</a>");
					printf ("<br>");
				}
			?>
		</div>
		
		<form autocomplete="off" action="index.php" method="post">
			<h2>Maak je planning</h2>
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
			<p><label>Wie spelen er mee?</label><input type="text" name="spelers" placeholder="namen van spelers" value=""></p>
			<p><label>Kies een uitlegger</label><input type="text" name="leider" placeholder="naam van uitlegger..." value=""></p>
			<p><label>Vul een starttijd in</label><input type="time" name="starttijd" placeholder="starttijd" value=""></p>
			<p><label>Vul een datum in</label><input type="date" name="datum" placeholder="datum" value=""></p>
			<button type="submit" name="button" class="btn" onclick="">Versturen</button><?php insertAppointment() ?><!-- function to submit -->
		</form>

		<div onscroll="myFunction()"id="planner">
			<script>
				function myFunction() {
					var elmnt = document.getElementById("planner");
					var x = elmnt.scrollLeft;
			    	var y = elmnt.scrollTop;
				}
			</script>
			<div class="plannerContent">
				<h2>Planning</h2>
				<?php 
					$query = $conn->prepare('Select * FROM planning');
					$query->execute();
					$result = $query->fetchAll();

					foreach ($result as $row) {
						$query2 = $conn->prepare('Select * FROM games WHERE id='.$row['spel']);
						$query2->execute();
						$result2 = $query2->fetch();
					printf ("<h3>Spel:</h3> ".$result2['name']."<br>"."<h3>Spelers:</h3> ".$row['spelers']."<br>"."<h3>Spelleider: </h3> ".$row['spelleider']."<br>"."<h3>Starttijd:</h3> ".$row['starttijd']."<br>"."<h3>Datum:</h3> ".$row['datum']."<button onclick=''>Wijzigen</button>"."<hr>");
					}
				?>
			</div>
		</div>

	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>