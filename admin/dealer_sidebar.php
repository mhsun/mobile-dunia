<?php session_start();

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
					<li class="<?php if ($page == 'dealer_dashboard.php') echo 'active';?>"><a href="dealer_dashboard.php">Home</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'add_dealer_product.php') echo 'active';?>"><a href="add_dealer_product.php">Add Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'manage_dealer_product.php' || $page == 'edit_dealer_product' || $page == 'edit_dealer_product.php') echo 'active';?>"><a href="manage_dealer_product.php">Manage Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'add_category.php') echo 'active';?>"><a href="add_category.php">Add Category</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'manage_category.php' || $page == 'view_category.php' || $page == 'edit_category.php') echo 'active';?>"><a href="manage_category.php">Manage Category</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li class="<?php if ($page == 'user_profile.php' || $page == 'edit_user_profile.php' || $page == 'user_pass.php') echo 'active';?>"><a href="user_profile.php">Profile</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>