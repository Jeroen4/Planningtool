<form autocomplete="off" action="createPlan.php" method="post">
	<h2>Maak je planning</h2>
	<p><label>Vul hier je naam in</label><input type="text" name="name" placeholder="naam..."></p>
	<p><label>Kies een spel</label><input type="text" name="game" placeholder="spelnaam..."></p>
	<p><label>Kies een uitlegger</label><input type="text" name="leader" placeholder="naam van uitlegger..."></p>
	<p><label>Vul een starttijd in</label><input type="text" name="starttime" placeholder="starttijd"></p>
	<p><label>Wie spelen er mee?</label><input type="text" name="players" placeholder="namen van spelers..."></p>
	<button type="submit" name="button" onclick="">Versturen</button><?php myfnc();
	
        function myfnc(){
        if($_POST){   
            if(empty($_POST["name"]) ||empty($_POST["game"])||empty($_POST["leader"])||empty($_POST["starttime"])||empty($_POST["players"])){
              print '<script type="text/javascript">alert("Alle velden zijn belangrijk")</script>';
            }
            else {
              header("location:planning.php?name=".test_input($_POST["name"])."&game=".test_input($_POST["game"]). "&leader=".test_input($_POST["leader"]). "&starttime=".test_input($_POST["starttime"]). "&players=".test_input($_POST["players"]));
            }   
          } 
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
}
    ?>

</form>


