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
							<li class="<?php if ($page == 'admin_dashboard.php') echo 'active';?>"><a href="admin_dashboard.php">Home</a></li>
						</ul>
					</div>
					<?php 
						if ($_SESSION['post'] == 'super-admin') { ?>
							<div class="menu_header">
								<ul class="<?php if ($page == 'add_admins.php' || $page == 'manage_admins.php' || $page == 'view_admins.php' || $page == 'edit_admins.php') echo 'active';?>">
									<li>Admin</li>
								</ul>
							</div>
							<div class="menu">
								<ul>
									<li><a href="add_admins.php">New Entry</a></li>
									<li><a href="manage_admins.php">Manage</a></li>
								</ul>
							</div>
					<?php	} ?>
					<?php 
						if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<div class="menu_header">
								<ul class="<?php if ($page == 'add_advertise.php' || $page == 'manage_advertise.php' || $page == 'view_advertise.php' || $page == 'edit_advertise.php') echo 'active';?>">
									<li>Advertise</li>
								</ul>
							</div>
							<div class="menu">
								<ul>
									<li><a href="add_advertise.php">New Entry</a></li>
									<li><a href="manage_advertise.php">Manage</a></li>
								</ul>
							</div>
					<?php	} ?>		
					<div class="single_menu_header">
						<ul>
							<li class="<?php if ($page == 'manage_dealers.php' || $page == 'view_dealer.php') echo 'active';?>"><a href="manage_dealers.php">Dealers</a></li>
						</ul>
					</div>
					<div class="single_menu_header">
						<ul>
							<li class="<?php if ($page == 'manage_new_cell_sellers.php' || $page == 'view_new_cell_seller.php') echo 'active';?>"><a href="manage_new_cell_sellers.php">New Cell Sellers</a></li>
						</ul>
					</div>
					<div class="single_menu_header">
						<ul>
							<li class="<?php if ($page == 'manage_old_cell_sellers.php' || $page == 'view_old_cell_seller.php') echo 'active';?>"><a href="manage_old_cell_sellers.php">Old Cell Sellers</a></li>
						</ul>
					</div>
					<?php 
						if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') {
					?>
					<div class="single_menu_header">
						<ul>
							<li class="<?php if ($page == 'message.php' || $page == 'view_message.php') echo 'active';?>"><a href="message.php">Messages</a></li>
						</ul>
					</div>
					<?php } ?>
					<div class="single_menu_header">
						<ul>
							<li class="<?php if ($page == 'admin_profile.php' || $page == 'edit_admin_profile.php' || $page == 'admin_pass.php') echo 'active';?>"><a href="admin_profile.php?id=<?= $_SESSION['id']; ?>">User Profile</a></li>
						</ul>
					</div>
					<div class="single_menu_header">
						<ul>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>