<?php
	include_once('database.php');
	include_once('validation.php');
	if (!empty($_POST)) {
		$post = htmlentities($_POST['post']);
		$userName = htmlentities($_POST['user']);
		$passWord = htmlentities($_POST['pass']);
		$passWord = md5($passWord);
		$flag = true;
		if ($post != "0") {
			if (!empty($userName)) {
				if (checkEmail($userName)) {
					if (!empty($passWord)) {
						if ($post == "admin") {
							$query = "select * from md_admin where admin_mail='$userName' and admin_pass='$passWord'";
							$result = selectData($query);
							if ($result) {
								session_start();
								$_SESSION['id'] = $result['admin_id'];
								$_SESSION['name'] = $result['admin_name'];
								$_SESSION['mail'] = $result['admin_mail'];
								$_SESSION['post'] = $result['admin_post'];
								header("location: admin_dashboard.php");
							} else {
								$flag = false;
								$msg = "Wrong username or password!";
							}
						} else {
							$query = "select * from md_user where user_mail='$userName' and user_pass='$passWord'";
							$result = selectData($query);
							if ($result) {
								session_start();
								$_SESSION['id'] = $result['user_id'];
								$_SESSION['name'] = $result['user_name'];
								$_SESSION['mail'] = $result['user_mail'];
								$_SESSION['post'] = $result['user_type'];
								
								if ($result['user_type'] == "dealer") {
									$cookie_name = "user";
									$cookie_value = "dealer";
									setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
									header("location: dealer_dashboard.php");
								} else {
									$cookie_name = "user";
									$cookie_value = "seller";
									setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
									header("location: cell_dashboard.php");
								}
							} else {
								$flag = false;
								$msg = "Wrong username or password!";
							}
						}
					} else {
						$flag = false;
						$msg = "Password can not be empty!";
					}
				} else {
					$flag = false;
					$msg = "Invalid Username!";
				}
			} else {
				$flag = false;
				$msg = "Username can not be empty!";
			}
		} else {
			$flag = false;
			$msg = "Please select an User Type!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
	<div class="container">
		<div class="warning">
			<p id="result"><?php global $msg; if ($msg) echo $msg;?></p>
		</div>
		<div class="login">
			<div class="login_header">
				<h2>Welcome to Login Panel!</h2>
			</div>
			<div class="login_body">
				<form action="" method="post">
					<table>
						<tr>
							<td>
								<select name="post" style="width: 224%;">
									<option value="0">--Select an User Type--</option>
									<option value="admin">Admin</option>
									<option value="user">Dealer</option>
									<option value="user">New Cell Seller</option>
									<option value="user">Old Cell Seller</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><h3>Username:</h3></td>
						</tr>
						<tr>
							<td><input type="email" name="user" placeholder="Type your email here"></td>
						</tr>
						<tr>
							<td><h3>Password:</h3></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" placeholder="Type your password here"></td>
						</tr>
						<tr class="sub">
							<td><input type="submit" value="Login"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>