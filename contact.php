<?php include_once('header.php'); ?>
	
	<div class="content">
		<div class="pro" id="cont">
			<div class="description">
				<h2>What is MOBILE DUNIA?</h2>
				<p>Mobile Dunia is an online platform where you can find your desired cell phone. If you're looking for selling or buying a cell phone you're in the right place. Here you can find old or new cell phone or you can sell your old cell phone. If you're a dealer of mobile phones you can make your market through our website. Just <a href="sign_up.php">sign up</a> and share your offers.</p>
			</div>
			<div id="con_tact">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
						
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<p id="txt" style="text-align: center;" class="warn"></p>
				<form action="" method="post">
					<table>
						<input type="hidden" name="action" value="contact">
						<tr>
							<td>Your Name</td>
						</tr>
						<tr>
							<td><input type="text" name="name" id="name" placeholder="Type your name here"></td>
						</tr>
						<tr>
							<td>Your Email</td>
						</tr>
						<tr>
							<td><input type="text" name="email" id="email" placeholder="Type your email here"></td>
						</tr>
						<tr>
							<td>Subject</td>
						</tr>
						<tr>
							<td><input type="text" name="subject" id="subject" placeholder="Type your subject here"></td>
						</tr>
						<tr>
							<td>Your Message</td>
						</tr>
						<tr>
							<td><textarea name="message" id="message"></textarea></td>
						</tr>
						<tr id="conbtn">
							<td><input type="submit" value="Submit" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
<?php include_once('sidebar.php'); ?>
<?php include_once('footer.php'); ?>