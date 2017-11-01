<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Advertises</h2>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Company Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php
						$query = "SELECT * FROM md_advertise ORDER BY id DESC";
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
						<td><?= $result['company']; ?></td>
						<td><?= $result['status']; ?></td>
						<td style="text-align: center;">
							<a href="view_advertise.php?v=<?= $result['id']; ?>" class="clr">View </a>| 
							<a href="edit_advertise.php?e=<?= $result['id']; ?>" class="edt">Edit </a>| 
							<a href="delete_advertise.php?d=<?= $result['id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')">Delete</a>
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