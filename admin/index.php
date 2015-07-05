<?php include "../includes/connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Menno's Videogame Database</title>
	<link rel="stylesheet" href="../assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>
	<?php 
	// Create a total for all the games in the database
	$selectGames =$db->prepare("SELECT COUNT(*) FROM game_collection");
	$selectGames->execute();
	$totalGames = $selectGames->fetchColumn();
	?>

	<div class="content">
		<p class="breadcrumbes"><a href="../index.php">Home</a> > <a href="index.php">Admin dashboard</a><p class="gameTotal">Game collection total: <?= $totalGames; ?></p></p>
		<h1>Admin dashboard</h1>
		<form action="controllers/admin-auth-controller.php" method="POST">
			<?php
				if(isset($_GET['error-msg'])){
					echo "<p class='error-msg'>" .urldecode($_GET['error-msg']). "</p><br>";
				}
			?>
			<label for="admin-username">Username</label><br>
			<input id="admin-username" type="text" name="admin-username" /><br><br>

			<label for="admin-password">Password</label><br>
			<input id="admin-password" type="password" name="admin-password" /><br><br>

			<input type="submit" name="admin-login" value="Login" />
		</form>
	</div>

</div>
</body>
<?php include "../includes/footer.php"; ?>	
</html>