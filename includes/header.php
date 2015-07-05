<?php session_start(); ?>
	<header>
		<a href="index"><img src="assets/img/header.png" /></a>
		
		<a href="https://www.facebook.com/mennovanderkrift" target="_blank"><img src="assets/img/social/facebook.png" class="social"/></a>
		<a href="https://www.linkedin.com/pub/menno-van-der-krift/62/104/46" target="_blank"><img src="assets/img/social/linkedin.png" class="social"/></a>
		<a href="https://www.youtube.com/user/makedaevilmage2" target="_blank"><img src="assets/img/social/youtube.png" class="social"/></a>
		<?php if($_SESSION): ?><p class="welcome-user">Welcome back <span class="username"><?= ucfirst($_SESSION["username"]); ?></span>! </p><?php endif; ?>
		
		<div class="search">
			<form method="POST" action="search">
				<label for="system">System</label>
				<select name="system" id="system">
					<option value="All">All</option>
					<?php 
						$consoles = $db->prepare("SELECT DISTINCT(console) FROM game_collection ORDER BY console");
						$consoles->execute();
						foreach($consoles as $console){
							echo "<option value='" .$console['console']. "'>" .$console['console']. "</option>";
						}
					 ?>
				</select>
				<input type="text" name="search" placeholder="ex. Final Fantasy"/>
				<input type="submit" name="searchGame" value="Search" class="button"/>
			</form>		
		</div> <!-- End div class search -->
	</header>	
