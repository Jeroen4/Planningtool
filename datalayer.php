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
        $stmt = $conn->prepare("INSERT INTO planning (spelers, spelleider, spel, starttijd, datum) VALUES (:spelers, :leider, :spel, :starttijd, :datum)");
        $stmt->execute([':spelers' => $_POST['spelers'], ':leider' => $_POST['leider'], ':spel' => $_POST['spel'],  ':starttijd' => $_POST['starttijd'], ':datum' => $_POST['datum']]);
        $conn = null;
    }

    function showAppointment(){
    	include ('connect.php');
    	$query = $conn->prepare('SELECT * FROM planning');
		$query->execute();
		$result = $query->fetchAll();

		foreach ($result as $row) {
			printf ("<h3>Spel:</h3> ".$row['spel']."<br>"."<h3>Spelers:</h3> ".$row['spelers']."<br>"."<h3>Spelleider: </h3> ".$row['spelleider']."<br>"."<h3>Starttijd:</h3> ".$row['starttijd']."<br>"."<h3>Datum:</h3> ".$row['datum']."<button onclick=''><span class='replies'>Wijzigen</span>
   			<span class='comment'>Wijzig'm!</span></button>"."<hr>");
		}
    }
?>