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
					printf ("<a href='dataGames.php?id=".$row['id']."'>".$row['name']."</a>");
					printf ("<br>");
				}
			?>
		</div>

		<div class="line"></div>
		
		<?php
		include ('createPlan.php');
		?>

		<div class="line2"></div>

		<div class="planner">
			<h4 class="update_btn">Update</h4>
		</div>

	</div>
	
	<?php 
		include ("footer.php");
	?>
</body>
</html>