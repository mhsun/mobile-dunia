<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 75px;">View Advertise</h2>
			</div>
			<div class="product_form">
			<?php
				$id = $_GET['v'];
				$query = "SELECT * FROM md_advertise WHERE id='$id'";
				$result = selectData($query);
			?>
				<table>
					<tr>
						<td>Company Name:</td>
						<td><input type="text" value="<?= $result['company']; ?>" disabled style="width: 180%;"></td>
					</tr>
					<tr>
						<td>Url:</td>
						<td><input type="text" value="<?= $result['url']; ?>" disabled style="width: 180%;"></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><input type="text" value="<?= $result['status']; ?>" disabled style="width: 180%;"></td>
					</tr>
					<tr>
						<td>Admin Image:</td>
						<td><img src="<?= $result['image']; ?>" style="width: 250px; height: 150px;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><a href="edit_advertise.php?e=<?= $result['id']; ?>"><input type="submit" value="EDIT"></a></td>
					</tr>
				</table>	
			</div>
		</div>
	</div>
</body>
</html>