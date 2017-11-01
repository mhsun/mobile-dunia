<?php include_once('database.php');
	$area = $_GET['area']; 
	if ($area != "0") {
		$query = "SELECT * FROM md_user_product WHERE p_area = '$area' ORDER BY p_id DESC";
	} else {
		$query = "SELECT * FROM md_user_product";
	}
		
	$res = selectAll($query);
?>
<div class="product_image">
	<?php
	$count = mysqli_num_rows($res);
		if ($count < 1) { ?>
		</table>
			<div class="msg">
				<?php echo "No records found"; ?>
			</div>
			</div>
		<?php
			} else {
				while ($result = mysqli_fetch_assoc($res)) { ?>
		<div class="item">
		    <a href="single_mobile.php?v=<?= $result['p_id']; ?>"><img src="assets/img/logo.png"/>
		    <span class="caption"><?= $result['p_model']; ?></span> </a>
		</div>
	<?php } }?>