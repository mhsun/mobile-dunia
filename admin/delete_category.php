<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_category WHERE cat_id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_category.php");
	} else {
		header("location: manage_category.php");
	}
?>