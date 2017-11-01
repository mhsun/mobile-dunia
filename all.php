<?php include_once('database.php');
	$query = "SELECT * FROM md_user_product ORDER BY p_id DESC";
	$res = selectAll($query);
?>
<div class="product_image">
	<?php while ($result = mysqli_fetch_assoc($res)) {?>
		<div class="item">
		    <a href="single_mobile.php?v=<?= $result['p_id']; ?>"><img src="assets/img/logo.png"/>
		    <span class="caption"><?= $result['p_model']; ?></span> </a>
		</div>
	<?php } ?>