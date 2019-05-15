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
        $stmt = $conn->prepare("INSERT INTO planning (id, spelers, spelleider, spel, starttijd, datum) VALUES (null, :spelers, :leider, :spel, :starttijd, :datum)");
        $stmt->execute([':id' => null['id'], ':spelers' => $_POST['spelers'], ':spelleider' => $_POST['spelleider'], ':spel' => $_POST['spel'],  ':starttijd' => $_POST['starttijd'], ':datum' => $_POST['datum']]);
        $conn = null;
    }

    function showAppointment(){
    	include ('connect.php');
    	$query = $conn->prepare('Select * FROM planning');
		$query->execute();
		$result = $query->fetchAll();

		foreach ($result as $row) {
			printf ("<h3>Spel:</h3> ".$row['spel']."<br>"."<h3>Spelers:</h3> ".$row['spelers']."<br>"."<h3>Spelleider: </h3> ".$row['spelleider']."<br>"."<h3>Starttijd:</h3> ".$row['starttijd']."<br>"."<h3>Datum:</h3> ".$row['datum']."<button onclick=''>Wijzigen</button>"."<hr>");
		}
    }
?>