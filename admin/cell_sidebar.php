<?php
	session_start();
	if ($_SESSION['id'] == "") {
		header("location: index.php");
	}
	include_once('database.php');
	include_once('validation.php');
	$link = explode('/',$_SERVER['PHP_SELF']);
	$page = $link[3];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<div class="sidebar">
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'cell_dashboard.php') echo 'active';?>"><a href="cell_dashboard.php">Home</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'add_cell_product.php') echo 'active';?>"><a href="add_cell_product.php">Add Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'manage_sellers.php' || $page == 'view_new_cell_product.php' || $page == 'view_old_cell_product.php' || $page == 'edit_new_cell_product.php' || $page == 'edit_old_cell_product.php') echo 'active';?>"><a href="manage_sellers.php">Manage Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'cell_profile.php' || $page == 'edit_cell_profile.php' || $page == 'cell_pass.php') echo 'active';?>"><a href="cell_profile.php">Profile</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>