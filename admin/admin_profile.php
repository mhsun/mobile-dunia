<?php include_once('admin_sidebar.php'); ?>
		<?php
			$id = $_SESSION['id'];
			$query = "SELECT * FROM md_admin WHERE admin_id='$id'";
			$result = selectData($query);
		?>
		<div class="content">
			<div class="user_img">
				<img src="<?= $result['admin_image'];?>" alt="User Image">
			</div>
			<div class="data" id="user">
				<table>
					<tr>
						<th>User Name</th>
						<td><?= $result['admin_name'];?></td>
					</tr>
					<tr>
						<th>User Email</th>
						<td><?= $result['admin_mail'];?></td>
					</tr>
					<tr>
						<th>User Phone</th>
						<td><?= $result['admin_cell'];?></td>
					</tr>
					<tr>
						<th>User Area</th>
						<td><?= $result['admin_address'];?></td>
					</tr>
				</table>
			</div>
			<div class="action">
				<a href="edit_admin_profile.php?e=<?= $id; ?>">Edit Information</a>
				<a href="admin_pass.php?p=<?= $id; ?>">Change Password</a>
			</div>
		</div>
	</div>
</body>
</html>