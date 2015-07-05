<?php
	include "includes/connect.php";

	//=================================== START ERROR HANDLING =======================================//

	$region = $_GET['region'];

	if(!isset($_GET['region'])){
		header('location: 404.php');
	}

	$countRows = $db-> prepare ("SELECT count(*) FROM game_collection WHERE region = :region");
	$countRows->bindParam('region', $region, PDO::PARAM_STR);
	$countRows->execute();
	$result = $countRows->fetchColumn();

	if(!$result == 1){
		// if no region is found, redirect to 404.php
		echo header("location: 404.php");
	}
	//=================================== END ERROR HANDLING =======================================//

	$stmt = $db -> prepare("SELECT * FROM game_collection WHERE region= :region");
	$stmt->bindParam('region', $region, PDO::PARAM_STR);
	$stmt->execute();
	
	// Create a total for all the games in the database
	$result = $db->prepare("SELECT COUNT(*) FROM game_collection");
	$result->execute(); 
	$totalGames = $result->fetchColumn();
	
	// Count the number of SNES games
	$result = $db-> prepare ("SELECT COUNT(*) FROM game_collection WHERE region= :region");
	$result->bindParam('region', $region, PDO::PARAM_STR);
	$result->execute(); 
	$totalRegionGames = $result->fetchColumn();

	if($totalRegionGames < 1){
		$totalRegionGames = "0. No games where found, due to lack of banana's.";

	}else{
		$totalRegionGames;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $region; ?> Games | Menno's Videogame Database</title>
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>

	<div class="content">
		<p class="breadcrumbes"><a href="index">Home</a> > <a href="region-page?region=<?= $region ?>"><?= $region ?> games</a><p class="gameTotal">Game collection total: <?php echo $totalGames; ?></p></p>
		<h1><?= $region; ?> games - Total: <?php echo $totalRegionGames;?></h1>
		
		<?php			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
				$cover = $row['cover'];
				$title = $row['title'];
				$console = $row['console'];
				$genre = $row['genre'];
				$region = $row['region'];
				$releaseDate = $row['releaseDate'];
				$description = $row['description'];
				$wikipedia = $row['wikipedia'];
				

				echo "<div class='gameInfo'>";
				echo '<a href="includes/deleteGame.php?id=<?= $id ?>" title="Delete game"><img src="assets/img/cross.png" alt="Delete game icon" class="delete-game-btn"></a>';

				echo "<p class='cover'><a href='gameDetails?id=$id'><img src=".$cover." /></a></p>";
				
				echo "<div class='gameInfoWrapper'>"; //gameInfoWrapper for the text
				echo "<p><a href='gameDetails?id=$id'>".$title."</p></a>";
				echo '<p>System: '.$console.'</p>';
				echo '<p>Genre: '.$genre.'</p>';
				echo "<div class='regionWrapper'><p class='region'>";
				echo "<a href='region-page?region=" .$region. "'><img src='assets/img/region/" .$region. ".png' class='regionSmall'></a>";

					
				echo'</p>';
				echo "</div>"; //end div class regionWrapper
				echo "</div>"; // end div class gameInfoWrapper
				echo "</div>"; //end div class gameInfo
			};
			echo "<div class='clear'></div>"; //Clear float
		?>
	</div>

</div>
<?php include "includes/footer.php"; ?>