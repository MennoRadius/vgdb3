<?php
include "includes/connect.php";

/////////////////////////////// ERROR HANDLING START ///////////////////////////////
if(!is_numeric($_GET['id'])){
	// if product_id is not a number, redirect to 404.php
	header("location: 404.php");
}else{
	$id = $_GET['id'];
}

$countRows = $db-> prepare ("SELECT count(*) FROM game_collection WHERE id=:id");
$countRows->bindParam(':id', $id, PDO::PARAM_STR);
$countRows->execute(); 
$result = $countRows->fetchColumn();

if(!$result == 1){
	// if no game is found, redirect to 404.php
	echo header("location: 404.php");
}
/////////////////////////////// ERROR HANDLING END ///////////////////////////////

// Create a total for all the games in the database
$result = $db->prepare("SELECT count(*) FROM game_collection");
$result->execute(); 
$totalGames = $result->fetchColumn();

$stmt = $db -> prepare("SELECT title FROM game_collection WHERE id=:id");
$stmt -> bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
	<?php while($title = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $title['title'];
	}
 	?>
 	 | Menno's Videogame Database</title>
 	 
	<link charset="utf-8" />
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php include "includes/header.php"; ?>	
<?php include "includes/nav.php"; ?>

<?php

$stmt = $db -> prepare("SELECT * FROM game_collection WHERE id=:id");
$stmt -> bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();

// Get all game details
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$id = $row['id'];
	$cover = $row['cover'];
	$title = $row['title'];
	
	//Check if there is a box for this game
	$box = $row['box'];
	if($box ==0){
		$box = 'No';
	}else if($box == 1){
		$box = 'Yes';
	}else{
		$box = 'Unknown';
	}
	
	//Check if there is a box for this game
	$manual = $row['manual'];
	if($manual ==0){
		$manual = 'No';
	}else if($manual == 1){
		$manual = 'Yes';
	}else{
		$manual = 'Unknown';
	}

	$console = $row['console'];
	$genre = $row['genre'];
	$region = $row['region'];
	$releaseDate = strtotime($row['releaseDate']);
	$description = $row['description'];
	$wikipedia = $row['wikipedia'];
?>
	<div class="content">
		<p class="breadcrumbes"><a href="index">Home</a> > <a href="gameDetails?id=<?= $id?>"><?php echo $title; ?></a> <p class="gameTotal">Game collection total: <?php echo $totalGames; ?></p></p>
		<h1>Game Details</h1>	
		
		<?php
				echo "<div class='gameDetails'>";
				echo "<p class='cover'><img src=".$cover." /></p>";
				echo '<p>Title: ' .$title. '</p>';
				echo '<p>Box: ' .$box. '</p>';
				echo '<p>Manual: ' .$manual. '</p>';					
				echo '</p>';
				echo '<p>Genre: '.$genre.'</p>';
				echo '<p>Release date: '.date("dS F Y", $releaseDate).'</p>';
				

					
				echo "<div class=regionWiki>";
				
					// Switch console image
					echo "<p><a href='console-page?console=" .$console. "'><img src='assets/img/system/" .$console. ".png' title='" .$console. " games' /></a>";
				
					echo "<a href='region-page?region=" .$region. "'><img src='assets/img/region/" .$region. ".png' class='regionSmall' title='" .$region. " games' /></a>";
				
					// Check if there is a Wikipedia link and put it on the Wikipedia logo. If not, show nothing.
					if ($wikipedia == ""){
					}else{
							echo "<p><a href='" .$wikipedia. "' target='_blank'><img src='assets/img/wikipedia.jpg' title='" .$title. " Wikipedia page'/></a></p>";
							echo "</div>";
						}
					};
					
				//end regionWiki div
				echo "</div>";
				// Clear float
				echo "<div class='clear'></div>";

				echo "<p>Description: ".$description."</p>";
		?>
		
	</div>

</div>
<?php include "includes/footer.php"; ?>	