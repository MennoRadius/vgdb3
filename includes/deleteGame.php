<?php
include("connect.php");

$id = $_GET['id'];
$title = $db->prepare("SELECT title FROM game_collection WHERE id=:id");
$title->bindParam(':id', $id, PDO::PARAM_STR);
$title->execute();
$title = $title->fetch();

$deleteGame = $db->prepare("DELETE FROM game_collection WHERE id=:id");
$deleteGame->bindParam(':id', $id, PDO::PARAM_STR);
$deleteGame->execute();

$msg = 'Game "'.$title['title']. '" has been deleted from the database';
header("location: ../index?success=".$msg);
?>