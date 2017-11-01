<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_admin WHERE admin_id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_admins.php");
	} else {
		header("location: manage_admins.php");
	}
?>