
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
					printf ("<br>");
			}	
?>
	<img src="img/<?php  echo $row['image']?>" alt="test <?php echo $_GET['id'] ?>" style="width:250px; height:250px;">
</body>
</html>