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
		<form autocomplete="off" action="send.php" method="POST">
			<h2>Maak je planning</h2>
			<p><label>Kies een spel</label>
				<select id="chooseGame" name="spel">
					<option value="">...</option>
					<?php 
					include ('connect.php');

					$query = $conn->prepare("SELECT name FROM games");
						$query->execute();
						$result = $query->fetchAll();

					 	foreach ($result as $array) {
	                      printf('<option value="">'. $array["name"].'</option>');
                        } 
                     ?>
				 </option>
				</select></p>
			<p><label>Wie spelen er mee?</label><input type="text" name="spelers" placeholder="namen van spelers" value=""></p>
			<p><label>Kies een uitlegger</label><input type="text" name="leider" placeholder="naam van uitlegger..." value=""></p>
			<p><label>Vul een starttijd in</label><input type="time" name="starttijd" placeholder="starttijd" value=""></p>
			<p><label>Vul een datum in</label><input type="date" name="datum" placeholder="datum" value=""></p>
			<button type="submit" name="button" class="pin" onclick=""><span class='replies'>Pin je planning</span>
   			<span class='comment'>Pin'm!</span></button><!-- function to submit -->
		</form>
	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>