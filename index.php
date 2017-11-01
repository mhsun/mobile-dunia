<?php include_once('header.php');?>
		<div class="content">
			<div class="col-md-7 ">
				<div class="description">
					<h2>What is MOBILE DUNIA?</h2>
					<p>Mobile Dunia is an online platform where you can find your desired cell phone. If you're looking for selling or buying a cell phone you're in the right place. Here you can find old or new cell phone or you can sell your old cell phone. If you're a dealer of mobile phones you can make your market through our website. Just <a href="sign_up.php">sign up</a> and share your offers.</p>
				</div>
				<div class="search">
					<form>
						<select name="brand" id="brand" onchange="showHint(this.value)" style="width: 30%;">
							<option value="0">--Search Your Query Here--</option>
							<option value="brand">Brand</option>
							<option value="price">Price</option>
							<option value="type">Used/New</option>
							<option value="area">Area</option>
							<option value="all">All</option>
						</select>
						<select name="brand" id="brn" onchange="showBrand(this.value)" style="display: none;">
							<option value="0">--Select a Brand--</option>
							<option value="Samsung">Samsung</option>
							<option value="Nokia">Nokia</option>
							<option value="Symphony">Symphony</option>
							<option value="Asus">Asus</option>
							<option value="Xiomi">Xiomi</option>
							<option value="all">All</option>
						</select>
						<select class="sel" id="price" onchange="showPrice(this.value)" style="display: none;">
							<option value="0">--Select Price Range--</option>
							<option value="4999">5000</option>
							<option value="5000-10000">5001-10000</option>
							<option value="10001">10000+</option>
						</select>
						<select class="sel" onchange="showType(this.value)" id="used" style="display: none;">
							<option value="0">--Select Phone Status--</option>
							<option value="old">Used</option>
							<option value="new">New</option>
						</select>
						<select id="area" onchange="showArea(this.value)" style="display: none;">
							<option value="0">--Select Area--</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Cittagong">Cittagong</option>
							<option value="Rajshahi">Rajshahi</option>
							<option value="Jessore">Jessore</option>
							<option value="Rangpur">Rangpur</option>
							<option value="Barisal">Barisal</option>
							<option value="Syllet">Syllet</option>
						</select>
					</form>
				</div>
				<?php
					$query = "SELECT * FROM md_user_product ORDER BY p_id DESC";
					$res = selectAll($query);
				?>
				<div class="product_image" id="txtHint">
					<?php while ($result = mysqli_fetch_assoc($res)) {?>
						<div class="item">
						    <a href="single_mobile.php?v=<?= $result['p_id']; ?>"><img src="admin/<?= $result['p_image']; ?> "/>
						    <span class="caption"><?= $result['p_model']; ?></span> </a>
						</div>
					<?php } ?>
					
				</div>
			</div>

<?php include_once('sidebar.php'); ?>
<?php include_once('footer.php'); ?>