	<nav>
		<ul>
			<li><a href="index">&nbsp; Home &nbsp;</a></li>
			<?php 

				$consoles = $db-> prepare ("SELECT DISTINCT(console) FROM game_collection ORDER BY console");
				$consoles->execute();

				foreach($consoles as $console): ?>
				<li><a href="../console-page?console=<?= $console['console'] ?>">&nbsp; <?= $console['console'] ?> &nbsp;</a></li>
			<?php endforeach; ?>
			<?php if(isset($_SESSION['username'])): ?>
			<li><a href="../admin/controllers/logout.php">&nbsp;Logout&nbsp;</a></li>
		<?php endif; ?>
		</ul>
	</nav>