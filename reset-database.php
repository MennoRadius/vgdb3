<?php
	include "includes/connect.php";

	$dropgames = $db->prepare("DROP TABLE IF EXISTS game_collection, users");
	$dropgames->execute();

	include("database.php");
	header("location: index.php?reset=Our three headed monkey successfully reset the database!")
?>