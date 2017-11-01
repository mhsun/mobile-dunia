<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2  style="margin-top: 50px;">View New Cell Seller</h2>
			</div>
			<div class="product_form">
				<table>
				<?php
					$id = $_GET['v'];
					$query = "SELECT * FROM md_user WHERE user_id='$id'";
					$result = selectData($query);
				?>
					<tr>
						<td>Name:</td>
						<td><input type="text" value="<?= $result['user_name']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" value="<?= $result['user_mail']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><input type="text" value="<?= $result['user_phone']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type="text" value="<?= $result['user_address']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Admin Image:</td>
						<td><img src="uploads/demo.jpg" style="width: 250px; height: 150px;"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>