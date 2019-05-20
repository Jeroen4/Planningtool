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
					printf ("<a class='nameLinks' href='dataGames.php?id=".$row['id']."'>".$row['name']."</a>");
					printf ("<br>");
				}
			?>
		</div>
		
		<button name="button" class="Planbtn" onclick="window.location.href = 'create.php';"><span class="replies">Maak een planning</span>
   			<span class="comment">Plan'm!</span></button><!-- function to submit -->

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
				showAppointment();
				?>
			</div>
		</div>

	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>