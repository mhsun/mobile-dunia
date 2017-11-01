<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2>Edit Admin</h2>
			</div>
			<div class="product_form">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<form action="" method="post">
					<table>
					<?php
						$id = $_GET['e'];
						$query = "SELECT * FROM md_admin WHERE admin_id='$id'";
						$result = selectData($query);
					?>
					<input type="hidden" name="action" value="edit_admin">
					<input type="hidden" name="id" value="<?php echo $_GET['e'];?>">
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?= $result['admin_name']; ?>"></td>
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><input type="text" name="phone" value="<?= $result['admin_cell']; ?>"></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type="text" name="area" value="<?= $result['admin_address']; ?>"></td>
					</tr>
					<tr>
						<td>Post:</td>
						<td>
							<select name="post" style="width: 345px;">
								<option value="0">--Select a Post--</option>
								<option value="sub-admin" <?php if($result['admin_post'] == 'sub-admin') echo "selected"; ?>>Sub Admin</option>
								<option value="site-manager" <?php if($result['admin_post'] == 'site-manager') echo "selected"; ?>>Site Manager</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Admin Image:</td>
						<td><img src="<?= $result['admin_image']; ?>" style="width: 250px; height: 150px;"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="file" name="photo"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><input type="submit" value="Save" onclick="submitForm(this)"></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>