<?php include_once('database.php'); ?>
<?php include_once('cell_sidebar.php'); ?>
	<div class="content">
		<div class="form_title cen">
			<h2 style="margin-top: 140px;">Change Password</h2>
		</div>
		<div class="product_form">
		<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
			
		</div>
		<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
			
		</div>
			<form action="" method="post">
				<table>
					<input type="hidden" name="action" value="user_pass">
					<input type="hidden" name="id" value="<?= $_GET['p']; ?>">
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
						<td class="btn"><input type="submit" value="Submit" name="sub" onclick="submitForm(this)"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>
</body>
</html>