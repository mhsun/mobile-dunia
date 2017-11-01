<?php include_once('admin_sidebar.php'); ?>
	<div class="content">
		<div class="form_title cen">
			<h2 style="margin-top: 140px;">Add New Advertise</h2>
		</div>
		<div class="product_form">
			<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
			</div>
			<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
				
			</div>
			<form action="" method="post" id="myForm">
				<table>
					<input type="hidden" name="action" value="advertise">
					<tr>
						<td>Company Name:</td>
						<td><input type="text" name="com" value="<?php if (isset($_POST['com'])) echo $_POST['com'] ?>"></td>
					</tr>
					<tr>
						<td>Url:</td>
						<td><input type="text" name="url" value="<?php if (isset($_POST['url'])) echo $_POST['url'] ?>"></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status" style="width: 345px;">
								<option value="0">--Select a Status--</option>
								<option value="Visible">Visible</option>
								<option value="Hide">Hide</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Image</td>
						<td><input type="file" name="photo" style="width: 180%;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><input type="submit" value="ADD" onclick="submitForm(this)"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>
</body>
</html>