<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET['id'] ?></title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "planningstool";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			
				$query = $conn->prepare('SELECT description FROM games WHERE id='.$_GET['id']);
				$query->execute();
				$result = $query->fetchAll();

				foreach ($result as $row) {
					printf ($row['description']);
			}	
	?>
	<img src="img/<?php  echo $row['image']?>" alt="test <?php echo $_GET['id'] ?>" style="width:250px; height:250px;">
</body>
</html>