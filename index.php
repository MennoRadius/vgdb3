<?php
	include "includes/connect.php";

	// Fetch all games with a limit of 6
	$stmt = $db -> prepare("SELECT * FROM game_collection ORDER BY id DESC LIMIT 6");
	$stmt->execute();

	// Count the rows of games in the database
	$result = $db->prepare("SELECT count(*) FROM game_collection");
	$result->execute(); 
	$totalGames = $result->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | Menno's Videogame Database</title>
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>

	<div class="content">
		<p class="breadcrumbes"><a href="index">Home</a> <p class="gameTotal">Game collection total: <?php echo $totalGames; ?></p></p>
		<h1>Recently added games</h1>
		<?php if (isset($_GET['success'])): ?> <p class="msg success"> <img src="assets/img/checkmark.png" alt="Success checkmark"> <?= $_GET['success']; ?><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>
		<?php if (isset($_GET['warning'])): ?> <p class="msg warning"> <?= $_GET['warning']; ?><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>
		<?php if (isset($_GET['reset'])): ?> <p class="msg success"> <img src="assets/img/three-headed-monkey.png" alt="Look behind you, it's a three headed monkey!" class="three-headed-monkey"><span class="reset"><?= $_GET['reset']; ?></span><img src="assets/img/cross.png" alt="Remove message" class="remove-msg" /></p><?php endif; ?>

		<div class="clear"></div>
		<br>

		<?php			
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
			$id 			= $row['id'];
			$cover 			= $row['cover'];
			$title 			= $row['title'];
			$console 		= $row['console'];
			$genre 			= $row['genre'];
			$region			= $row['region'];
			$releaseDate 	= $row['releaseDate'];
			$description 	= $row['description'];
			$wikipedia	 	= $row['wikipedia'];
		?>
				
			<div class="gameInfo">
				<a href="includes/deleteGame.php?id=<?= $id ?>" title="Delete game"><img src="assets/img/cross.png" alt="Delete game icon" class="delete-game-btn"></a>
				<p class="cover"><a href="gameDetails?id=<?= $id ?>" title="<?= $title ?> for the <?= $console ?>"><img src="<?= $cover ?>" /></a></p>	
				<div class="gameInfoWrapper"> <!-- gameInfoWrapper for the text -->
				<p><a href="gameDetails?id=<?= $id ?>"><?= $title ?></a></p>
				<p>System: <a href="console-page?console=<?= $console ?>" class="console-link"><img src="assets/img/system/<?= $console  ?>.png" class="console-img" title="<?= $console ?> games" /></a></p>
				<p>Genre: <?= $genre  ?></p>
					<div class="regionWrapper">
						<p class="region">
							<p>Region: <a href="region-page?region=<?= $region ?>" class="region-link">
								<img src="assets/img/region/<?= $region ?>.png" class="regionSmall" title="<?= $region ?> games"></a>
							</p>
						</p>
					</div> <!-- end div class regionWrapper -->
				
				</div> <!-- end div class gameInfoWrapper -->
			</div> <!-- end div class gameInfo -->
			<?php endwhile; ?>
		<div class='clear'></div> <!-- Clear float -->
	</div> <!-- end class content -->
</div> <!-- end class container -->
<?php include "includes/footer.php"; ?>