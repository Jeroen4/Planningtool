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
        /*if(empty($_POST["spel"]) ||empty($_POST["spelers"])||empty($_POST["spelleider"])||empty($_POST["starttijd"])||empty($_POST["datum"])){
              print '<script type="text/javascript">alert("Alle velden zijn verplicht")</script>';
            }*/
    }

    function showAppointment(){
    	include ('connect.php');
    	$query = $conn->prepare('Select * FROM planning');
		$query->execute();
		$result = $query->fetchAll();

    	foreach ($result as $row) {
			$query2 = $conn->prepare('Select * FROM games WHERE id='.$row['spel']);
			$query2->execute();
			$result2 = $query2->fetch();
			printf ("<h3>Spel:</h3> ".$result2['name']."<br>"."<h3>Spelers:</h3> ".$row['spelers']."<br>"."<h3>Spelleider: </h3> ".$row['spelleider']."<br>"."<h3>Starttijd:</h3> ".$row['starttijd']."<br>"."<h3>Datum:</h3> ".$row['datum']."<button onclick=''>Wijzigen</button>"."<hr>");
		}
    }
?>