	<?php session_start(); ?>
	<header>
		<img src="../assets/img/header.png" />
		
		<a href="https://www.facebook.com/mennovanderkrift" target="_blank"><img src="../assets/img/social/facebook.png" class="social"/></a>
		<a href="https://www.linkedin.com/pub/menno-van-der-krift/62/104/46" target="_blank"><img src="../assets/img/social/linkedin.png" class="social"/></a>
		<a href="https://www.youtube.com/user/makedaevilmage2" target="_blank"><img src="../assets/img/social/youtube.png" class="social"/></a>
		
		<div class="search">
			<form method="POST" action="../searchResults.php">
				<label for="system">System</label>
				<select name="system" id="system">
					<option value="All">All</option>
					<option value="NES">NES</option>
					<option value="SNES">Super Nintendo</option>
					<option value="Playstation 1">Playstation 1</option>
				</select>
				<input type="text" name="search" placeholder="ex. Final Fantasy"/>
				<input type="submit" name="searchGame" value="Search" class="button"/>
			</form>		
		</div> <!-- End div class search -->
	</header>	
