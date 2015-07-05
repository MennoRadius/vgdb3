<?php
	require "includes/connect.php";

	//=================================== START ERROR HANDLING =======================================//

	if(!isset($_GET['console'])){
		header('location: 404.php');
	}
	$console = $_GET['console'];

	$countRows = $db-> prepare ("SELECT count(*) FROM game_collection WHERE console = :console");
	$countRows->bindParam('console', $console, PDO::PARAM_STR);
	$countRows->execute();
	$result = $countRows->fetchColumn();

	if(!$result == 1){
		// if no console is found, redirect to 404.php
		echo header("location: 404.php");
	}
	//=================================== END ERROR HANDLING =======================================//

	$stmt = $db -> prepare("SELECT DISTINCT(console) FROM game_collection WHERE console= :console ORDER BY id DESC");
	$stmt -> bindParam('console', $console, PDO::PARAM_STR);
	$stmt->execute();
	
	// Create a total for all the games in the database
	$result = $db->prepare("SELECT count(*) FROM game_collection");
	$result->execute(); 
	$totalGames = $result->fetchColumn();
	
	// Count the number of games 
	$result = $db-> prepare ("SELECT count(*) FROM game_collection WHERE console= :console ");
	$result->bindParam('console',$console, PDO::PARAM_STR);
	$result->execute(); 
	$totalConsoleGames = $result->fetchColumn();

	if($totalConsoleGames < 1){
		$totalConsoleGames = "0. No games where found, due to lack of banana's.";

	}else{
		$totalConsoleGames;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
	<?php
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo $row['console'];
		}

	?>
	 | Menno's Videogame Database</title>
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>
<?php
// sets $console variable again. This gets unset while requiring nav.php
$console = $_GET['console']; ?>

	<div class="content">
		<p class="breadcrumbes"><a href="index.php">Home</a> > <a href="console-page.php?console=<?= $console ?>"><?= $console ?> games</a><p class="gameTotal">Game collection total: <?= $totalGames ?></p></p>
		<h1><?= $console ?> games- Total: <?= $totalConsoleGames ?></h1>
		<?php if (isset($_GET['success'])): ?> <p class="msg success"> <img src="assets/img/checkmark.png" alt="Success checkmark"> <?= $_GET['success']; ?></p><?php endif; ?>
		<?php if (isset($_GET['warning'])): ?> <p class="msg warning"> <?= $_GET['warning']; ?></p><?php endif; ?>
		<div class="clear"></div>

		<?php
			$stmt = $db -> prepare("SELECT * FROM game_collection WHERE console= :console ORDER BY id DESC");
			$stmt -> bindParam('console', $console, PDO::PARAM_STR);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
				$id = $row['id'];
				$cover = $row['cover'];
				$title = $row['title'];
				$console = $row['console'];
				$genre = $row['genre'];
				$region = $row['region'];
		?>				
			<div class="gameInfo">
				<a href="includes/deleteGame.php?id=<?= $id ?>" title="Delete game"><img src="assets/img/cross.png" alt="Delete game icon" class="delete-game-btn"></a>
				<p class="cover"><a href="console-page?console=<?= $console ?>"><img src="<?= $cover ?>" /></a></p>
				<p><a href="gameDetails?id=<?= $id ?>"><?= $title ?></p></a>
				<p>System: <a href="console-page.php?console=<?= $console ?>" title="<?= $console ?> games"><?= $console ?></a></p>
				<p>Genre: <?= $genre ?></p>

				<div class="regionWrapper">
					<p class="region">
				<p>Region: <a href="region-page?region=<?= $region ?>" class='region-link'><img src='assets/img/region/<?= $region ?>.png' class='regionSmall' title="<?= $region ?> games" /></a></p></p>
					</p>
				</div> <!-- end regionWrapper -->
			</div> <!-- end gameInfo-->

			<?php endwhile; ?>

			<div class='clear'></div>
	</div>
</div>
<?php include "includes/footer.php"; ?>