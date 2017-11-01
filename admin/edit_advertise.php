<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 75px;">Edit Advertise</h2>
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
						$query = "SELECT * FROM md_advertise WHERE id='$id'";
						$result = selectData($query);
					?>
					<input type="hidden" name="action" value="edit_advertise">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
						<tr>
							<td>Company Name:</td>
							<td><input type="text" name="com" value="<?= $result['company']; ?>" style="width: 345px;"></td>
						</tr>
						<tr>
							<td>Url:</td>
							<td><input type="text" name="url" value="<?= $result['url']; ?>" style="width: 345px;"></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<select name="status" style="width: 350px;">
									<option value="0">--Select a Status--</option>
									<option value="Visible" <?php if ($result['status'] == "Visible") echo "selected"; ?>>Visible</option>
									<option value="Hide" <?php if ($result['status'] == "Hide") echo "selected"; ?>>Hide</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Admin Image:</td>
							<td><img src="<?= $result['image']; ?>" style="width: 250px; height: 150px;"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="file" name="photo" title="Change"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="SAVE" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>