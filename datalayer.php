<?php 
function getGames(){
	include ('connect.php');


	$query = $conn->prepare("SELECT * FROM games");
		$query->execute();
		$result = $query->fetchAll();

		foreach ($result as $row) {
			printf ($row['name']);
		}
}
 function InsertAppointment(){
    // prepare and bind
   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "planningstool";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);	

        $stmt = $conn->prepare("INSERT INTO planning (spel, spelers, leider, starttijd, datum) VALUES (:spel, :spelers, :leider, :starttijd, :datum)");
        $stmt->execute([':spel' => $_POST['spel'], ':spelers' => $_POST['spelers'], ':leider' => $_POST['leider'],  ':starttijd' => $_POST['starttijd'], ':datum' => $_POST['datum']]);
        $conn = null;

    }
?>