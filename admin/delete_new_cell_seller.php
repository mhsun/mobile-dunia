<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_user WHERE user_id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_new_cell_sellers.php");
	} else {
		header("location: manage_new_cell_sellers.php");
	}
?>