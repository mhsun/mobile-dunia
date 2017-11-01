<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_advertise WHERE id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_advertise.php");
	} else {
		header("location: manage_advertise.php");
	}
?>