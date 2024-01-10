<?php
	include "config.php";
	$s="delete from users where id={$_GET["id"]}";
	$connect->query($s);
	echo "<script>window.open('AdminUsers.php?mes=Data Deleted...','_self');</script>";


?>