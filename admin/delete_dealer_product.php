<?php
	include_once('database.php');
	$id = $_GET['d'];
	$query = "DELETE FROM md_product WHERE p_id='$id'";
	$res = deleteData($query);

	if ($res) {
		header("location: manage_dealer_product.php");
	} else {
		header("location: manage_dealer_product.php");
	}
?>