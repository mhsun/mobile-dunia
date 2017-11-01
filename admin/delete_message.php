<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_msg WHERE id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: message.php");
	} else {
		header("location: message.php");
	}
?>