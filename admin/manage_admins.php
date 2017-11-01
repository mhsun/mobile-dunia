<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Admins</h2>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Post</th>
						<th>Action</th>
					</tr>
					<?php
						$query = "SELECT * FROM md_admin ORDER BY admin_id DESC";
						$res = selectAll($query);
						$count = mysqli_num_rows($res);
						if ($count < 1) { ?>
						</table>
							<div class="msg">
								<?php echo "No records found"; ?>
							</div>
							</div>
						<?php
							} else {
								while ($result = mysqli_fetch_assoc($res)) { 
						?>
					<tr>
						<td style="text-align: center;"><?= $result['admin_name']; ?></td>
						<td style="text-align: center;"><?= $result['admin_cell']; ?></td>
						<td style="text-align: center;"><?= $result['admin_post']; ?></td>
						<td style="text-align: center;">
							<a href="view_admins.php?v=<?= $result['admin_id']; ?>" class="clr">View </a>| 
							<a href="edit_admins.php?e=<?= $result['admin_id']; ?>" class="edt">Edit </a>| 
							<a href="delete_admins.php?d=<?= $result['admin_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>