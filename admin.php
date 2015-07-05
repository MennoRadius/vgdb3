<?php include "includes/connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Menno's Videogame Database</title>
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/css/style.css" />
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
		<?php if (isset($_GET['success'])): ?> <p class="msg success"> <img src="assets/img/checkmark.png" alt="Success checkmark"> <?= $_GET['success']; ?><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>
		<?php if (isset($_GET['warning'])): ?> <p class="msg warning"> <?= $_GET['warning']; ?><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>
		<?php if (isset($_GET['reset'])): ?> <p class="msg success"> <img src="assets/img/three-headed-monkey.png" alt="Look behind you, it's a three headed monkey!" class="three-headed-monkey"><span class="reset"><?= $_GET['reset']; ?></span><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>

		<form action="controllers/admin-auth-controller.php" method="POST">
			<label for="admin-username">Username</label><br>
			<input id="admin-username" type="text" name="admin-username" /><br><br>

			<label for="admin-password">Password</label><br>
			<input id="admin-password" type="password" name="admin-password" /><br><br>

			<input type="submit" name="admin-login" value="Login" />
		</form>
	</div> <!-- end class content --> 
</div> <!-- end class container -->
<?php include "includes/footer.php"; ?>	