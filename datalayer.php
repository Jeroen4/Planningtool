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
 function insertAppointment(){
   		include ('connect.php');
        $stmt = $conn->prepare("INSERT INTO planning (spel, spelers, spelleider, starttijd, datum) VALUES (:spel, :spelers, :leider, :starttijd, :datum)");
        $stmt->execute([':spel' => $_POST['spel'], ':spelers' => $_POST['spelers'], ':leider' => $_POST['leider'],  ':starttijd' => $_POST['starttijd'], ':datum' => $_POST['datum']]);
        $conn = null;
    }
?>