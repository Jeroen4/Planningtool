<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET['id'] ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="gameInfo">
	<?php 
		include ('connect.php');
			
		$query = $conn->prepare('SELECT description, image FROM games WHERE id='.$_GET['id']);
		$query->execute();
		$result = $query->fetchAll();

		foreach ($result as $row) {
			printf ($row['description']);
			$filepath= 'img/'.$row['image'];
			printf ("<img src=".$filepath.">");
		}	
	?>
	</div>
</body>
</html>