<?php
	include "config.php";
	$s="delete from reviews where id={$_GET["rid"]}";
	$connect->query($s);
	echo "<script>window.open('Reviews.php?mes=Data Deleted...','_self');</script>";


?>