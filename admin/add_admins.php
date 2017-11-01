
<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2>Add New Admin</h2>
			</div>
			<div class="product_form">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<input type="hidden" name="action" value="admin">
						<tr>
							<td>Name:</td>
							<td><input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ?>"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="pass" id="pass" value="<?php if (isset($_POST['pass'])) echo $_POST['pass'] ?>"></td>
						</tr>
						<tr>
							<td>Confirm Password</td>
							<td><input type="password" name="con_pass" id="con_pass" value="<?php if (isset($_POST['con_pass'])) echo $_POST['con_pass'] ?>"></td>
						</tr>
						<tr>
							<td>Mobile:</td>
							<td><input type="text" name="phone" id="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>"></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><input type="text" name="area" id="area" value="<?php if (isset($_POST['area'])) echo $_POST['area'] ?>"></td>
						</tr>
						<tr>
							<td>Post:</td>
							<td>
								<select name="post" style="width: 345px;">
									<option value="0">--Select a Post--</option>
									<option value="sub-admin">Sub Amdin</option>
									<option value="site-man">Site Manager</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Mobile Image:</td>
							<td><input type="file" name="photo"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="Submit" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>