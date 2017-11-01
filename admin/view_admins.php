<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2  style="margin-top: 30px;">View Admin</h2>
			</div>
			<div class="product_form">
				<table>
				<?php
					$id = $_GET['v'];
					$query = "SELECT * FROM md_admin WHERE admin_id='$id'";
					$result = selectData($query);
				?>
					<tr>
						<td>Name:</td>
						<td><input type="text" value="<?= $result['admin_name']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" value="<?= $result['admin_mail']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><input type="text" value="<?= $result['admin_cell']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type="text" value="<?= $result['admin_address']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Post:</td>
						<td><input type="text" value="<?= $result['admin_post']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Admin Image:</td>
						<td><img src="<?= $result['admin_image']; ?>" style="width: 250px; height: 150px;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><a href="edit_admins.php?e=<?= $result['admin_id']; ?>"><input type="submit" value="Edit"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>