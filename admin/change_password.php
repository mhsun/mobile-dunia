<?php include_once('database.php'); ?>
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
					<li><a href="">Home</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="">Add Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="">Manage Product</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="">Add Category</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="">Manage Category</a></li>
				</ul>
			</div>
			<div class="single_menu_header"  style="background-color: #669999;">
				<ul>
					<li><a href="">Profile</a></li>
				</ul>
			</div>
			<div class="single_menu_header">
				<ul>
					<li><a href="">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 140px;">Change Password</h2>
			</div>
			<div class="product_form">
			<?php
				$id = $_GET['p'];
				$query = "SELECT * FROM md_admin WHERE admin_id='$id'";
				$result = selectData($query);

				if (isset($_POST['sub'])) {
					$oldPass = htmlentities($_POST['old_pass']);
					$newPass = htmlentities($_POST['new_pass']);
					$conPass = htmlentities($_POST['con_pass']);

					if (!empty($oldPass)) {
						$oldPass = md5($oldPass);
						if ($oldPass == $result['admin_pass']) {
							if (!empty($newPass)) {
								if (!empty($conPass)) {
									if ($newPass == $conPass) {
										$newPass = md5($newPass);
										$str = "UPDATE md_admin SET admin_pass='$newPass'";
										$res = insertData($str);
										if ($res) {
											$flag = true;
											$msg = "Password changed";
											$_POST = array('');
										} else {
											$msg = "Can not change password";
										}
									} else {
										$msg = "Password confirmation failed";
									}
								} else {
									$msg = "Please confirm your new password";
								}
							} else {
								$msg = "Please provide your new password";
							}
						} else {
							$msg = "Wrong password";
						}
					} else {
						$msg = "Please provide your old password";
					}
				} 
			?>
			<div class="submsg" style="<?php global $msg; if($msg){ echo 'display: block';} else { echo 'display: none'; }?>">
					<p style="text-align: center; padding-bottom: 5px;"><?php
					global $msg,$flag;
					if ($msg) {
						if ($flag == false) {
							echo "<span style='color: #ff0000;'>".$msg."</span>";
						} else {
							echo "<span style='color: green;'>".$msg."</span>";
						}
					}
					?></p>
				</div>
				<form action="" method="post">
					<table>
						<tr>
							<td>Old Password:</td>
							<td><input type="password" name="old_pass" style="width: 180%;" value="<?php if (isset($_POST['old_pass'])) echo $_POST['old_pass'] ?>"></td>
						</tr>
						<tr>
							<td>New Password:</td>
							<td><input type="password" name="new_pass" style="width: 180%;"></td>
						</tr>
						<tr>
							<td>Confirm Password:</td>
							<td><input type="password" name="con_pass" style="width: 180%;"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="Submit" name="sub"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>