<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Messages/Requests</h2>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
					<?php
						$query = "SELECT * FROM md_msg";
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
						<td><?= $result['name']; ?></td>
						<td><?= $result['email']; ?></td>
						<td><?= $result['subject']; ?></td>
						<td><?= $result['message']; ?></td>
						<td style="text-align: center;">
							<a href="view_message.php?v=<?= $result['id']; ?>" class="clr">View </a>|
							<?php 
								if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<a href="delete_message.php?d=<?= $result['id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
							<?php } ?>
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