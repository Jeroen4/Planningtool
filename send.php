<?php 
include ('connect.php');
include ('datalayer.php');

insertAppointment();

header("Location: index.php");
?>