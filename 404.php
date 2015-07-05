<?php
include "includes/connect.php";

// Create a total for all the games in the database
$result = $db->prepare("SELECT count(*) FROM game_collection");
$result->execute(); 
$totalGames = $result->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
	<title> 404 | Menno's Videogame Database</title>
	<link type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<script>
		function goBack() {
			window.history.back()
		}
	</script>
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>
	<div class="content">
		<p class="breadcrumbes"><a href="index.php">Home</a><p class="gameTotal">Game collection total: <?php echo $totalGames; ?></p></p>
		<h1>Error 404</h1>
		<p class="warning"> The page you tried to visited no longer exists, is moved or does not exist.</p>
	</div>

</div>
<?php include "includes/footer.php"; ?>