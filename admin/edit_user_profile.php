<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 75px;">Edit Profile</h2>
			</div>
			<div class="product_form">
			<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
			</div>
			<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
				
			</div>
				<form action="" method="post">
				<?php
					$id = $_GET['e'];
					$query = "SELECT * FROM md_user WHERE user_id='$id'";
					$result = selectData($query);
				?>
					<table>
						<input type="hidden" name="action" value="edit_user">
						<input type="hidden" name="id" value="<?php echo $_GET['e'];?>">
						<tr>
							<td>Name:</td>
							<td><input type="text" name="name" value="<?= $result['user_name']; ?>"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" name="cell" value="<?= $result['user_phone']; ?>"></td>
						</tr>
						<tr>
							<td>Area:</td>
							<td>
								<select name="area">
									<option value="0">--Select a Division--</option>
									<option value="Barishal" <?php if($result['user_address'] =="Barishal") echo "selected"; ?>>Barishal</option>
									<option value="Chittagong" <?php if($result['user_address'] =="Chittagong") echo "selected"; ?>>Chittagong</option>
									<option value="Dhaka" <?php if($result['user_address'] =="Dhaka") echo "selected"; ?>>Dhaka</option>
									<option value="Khulna" <?php if($result['user_address'] =="Khulna") echo "selected"; ?>>Khulna</option>
									<option value="Syllet" <?php if($result['user_address'] =="Syllet") echo "selected"; ?>>Syllet</option>
									<option value="Rajshahi" <?php if($result['user_address'] =="Rajshahi") echo "selected"; ?>>Rajshahi</option>
									<option value="Rangpur" <?php if($result['user_address'] =="Rangpur") echo "selected"; ?>>Rangpur</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image:</td>
							<td><img src="<?= $result['user_image']; ?>" style="width: 250px; height: 150px;"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="file" name="photo"></td>
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