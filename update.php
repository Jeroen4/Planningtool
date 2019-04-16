<?php include 'datalayer.php' ?>

<form autocomplete="off" action="index.php" method="post">
			<h2>Maak je planning</h2>
			<p><label>Kies een spel</label>
				<select id="chooseGame" name="spel">
					<option value="">...</option>
					<?php 
					 	foreach ($result as $array) {
	                      printf('<option value="'. $array["id"].'">'. $array["name"] . '</option>');
                        } 
                     ?>
				 </option>
				</select></p>
			<p><label>Wie spelen er mee?</label><input type="text" name="spelers" placeholder="namen van spelers" value=""></p>
			<p><label>Kies een uitlegger</label><input type="text" name="leider" placeholder="naam van uitlegger..." value=""></p>
			<p><label>Vul een starttijd in</label><input type="time" name="starttijd" placeholder="starttijd" value=""></p>
			<p><label>Vul een datum in</label><input type="date" name="datum" placeholder="datum" value=""></p>
			<button type="submit" name="button" class="btn" onclick="">Versturen</button><?php InsertAppointment() ?><!-- function to submit -->
</form>