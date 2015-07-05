<?php
	require "includes/connect.php";

	if(empty($_POST['system'])){
		header('location: index');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search game | Menno's Videogame Database</title>
	<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
<div class="container">
<?php require "includes/header.php"; ?>	
<?php require "includes/nav.php"; ?>

<?php	
	// Getting input from the search form
	$search	= trim($_POST['search']);

	// trim parameter one is the variable that needs to be stripped,
	// parameter two are the characters between the "" that need to
	// be trimmed of the beginning and the end of the string
	$searchTerm = '%' .$search. '%';
	$console = trim($_POST['system']);

	// Pulling the games from the game_collecion table with the input provided from the search form
	// If system == All, check all systems
		// else just check the specified system
	if($console == 'All'){
		$stmt = $db->prepare("SELECT * FROM game_collection WHERE title LIKE  :searchTerm OR description LIKE :searchTerm ORDER BY id ASC");
		$stmt->bindParam('searchTerm', $searchTerm, PDO::PARAM_STR);
		$stmt->execute();

		$countGames = $db->prepare("SELECT COUNT(*) FROM game_collection WHERE title LIKE  :searchTerm OR description LIKE :searchTerm ORDER BY id ASC");
		$countGames->bindParam('searchTerm', $searchTerm, PDO::PARAM_STR);
		$countGames->execute();
		$countGames = $countGames->fetchColumn();

	}else{
		$stmt = $db->prepare("SELECT * FROM game_collection WHERE console = :console AND title LIKE :searchTerm OR console = :console AND description LIKE :searchTerm ORDER BY id ASC");
		$stmt->bindParam('console', $console, PDO::PARAM_STR);
		$stmt->bindParam('searchTerm', $searchTerm, PDO::PARAM_STR);
		$stmt->execute();

		$countGames = $db->prepare("SELECT COUNT(*) FROM game_collection WHERE console = :console AND title LIKE :searchTerm OR console = :console AND description LIKE :searchTerm ORDER BY id ASC");
		$countGames->bindParam('searchTerm', $searchTerm, PDO::PARAM_STR);
		$countGames->bindParam('console', $console, PDO::PARAM_STR);
		$countGames->execute();
		$countGames = $countGames->fetchColumn();
	}
		
	// Create a total for all the games in the database
	// Count the rows of games in the database
	$result = $db->prepare("SELECT count(*) FROM game_collection");
	$result->execute(); 
	$totalGames = $result->fetchColumn();

	$searchTerm = trim($searchTerm, "%");
 ?>

	<div class="content">
		<p class="breadcrumbes"><a href="index">Home</a> <p class="gameTotal">Game collection total: <?= $totalGames; ?></p></p>
		<h1>Search results</h1>
			
			<p>System: <?= $console; ?></p>
			<p>Search term:
			<?php
				if($searchTerm == ''){
					echo 'All games';
				}else{
				// strip_tags removes HTML tags from the users input
				echo $searchTerm;
				}
			?>
			</p>
			
			<p>
				<?php
					if($countGames > 0){
						echo 'The plumber came back with a total of ' .$countGames. ' game(s).';
					}else{
						echo "The plumber could not locate any games.<br>
						Try to narrow down the search term ex. Final instead of Final Fantasy.<br><br>
						<img src='assets/img/mario-dies.png' class='mario-dies' alt='mario dies'>";
					}
				?>
			
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
				<input type="text" name="search" placeholder="ex. Final Fantasy" value="<?= $searchTerm; ?>"/>
				<input type="submit" name="searchGame" value="Search" class="button"/>
			</form>		
			<br>
			
		<?php			
			foreach($stmt as $row){
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
					echo "<p class='cover'><a href='gameDetails?id=$id'><img src=".$cover." /></a></p>";
						echo "<div class='gameInfoWrapper'>"; //gameInfoWrapper for the text
						echo "<p><a href='gameDetails?id=$id'>".$title."</p></a>";
						echo '<p>System: <a href="console-page.php?console=' .$console. '" title="' .$console. ' games">'.$console.'</a></p>';
						echo '<p>Genre: '.$genre.'</p>';
						echo "<div class='regionWrapper'><p class='region'>"; // regionWrapper for the region flag image and Wikipedia logo (if a Wikipedia link was inputted)
						echo "<a href='region-page?region=" .$region. "'><img src='assets/img/region/" .$region. ".png' class='regionSmall' title=' ".$region." games'></a></p>";
				
						echo "</div>"; // end div class regionWrapper
					echo "</div>"; // end div class gameInfoWrapper
				echo "</div>"; // end div class gameInfo
			};
			echo "<div class='clear'></div>"; //Clear float
		?>
	</div>
</div>
<?php require "includes/footer.php"; ?>