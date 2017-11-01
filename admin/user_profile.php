<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
		<?php
			$id = $_SESSION['id'];
			$query = "SELECT * FROM md_user WHERE user_id='$id'";
			$result = selectData($query);
		?>
			<div class="user_img">
				<img src="<?= $result['user_image'];?>" alt="User Image">
			</div>
			<div class="data" id="user">
				<table>
				
					<tr>
						<th>User Name</th>
						<td><?= $result['user_name'];?></td>
					</tr>
					<tr>
						<th>User Email</th>
						<td><?= $result['user_mail'];?></td>
					</tr>
					<tr>
						<th>User Phone</th>
						<td><?= $result['user_phone'];?></td>
					</tr>
					<tr>
						<th>User Area</th>
						<td><?= $result['user_address'];?></td>
					</tr>
				</table>
			</div>
			<div class="action">
				<a href="edit_user_profile.php?e=<?= $id; ?>">Edit Information</a>
				<a href="user_pass.php?p=<?= $id; ?>">Change Password</a>
			</div>
		</div>
	</div>
</body>
</html>