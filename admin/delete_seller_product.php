<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_user_product WHERE p_id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_sellers.php");
	} else {
		header("location: manage_sellers.php");
	}
?>