<?php
	include "config.php";
	$s="delete from message where Message_ID={$_GET["mid"]}";
	$conn->query($s);
	echo "<script>window.open('Messages.php?mes=Data Deleted...','_self');</script>";


?>