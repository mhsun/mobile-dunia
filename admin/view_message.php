<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2  style="margin-top: 30px;">View Message</h2>
			</div>
			<div class="product_form">
				<table>
				<?php
					$id = $_GET['v'];
					$query = "SELECT * FROM md_msg WHERE id='$id'";
					$result = selectData($query);
				?>
					<tr>
						<td>Name:</td>
						<td><input type="text" value="<?= $result['name']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" value="<?= $result['email']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><input type="text" value="<?= $result['subject']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><textarea style="resize: none;width: 200%;height: 150px;" disabled><?= $result['message']; ?></textarea></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>