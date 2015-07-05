<?php
session_start();
	session_unset();
	session_destroy();
	$success = urlencode("You are now logged out");
	header('location: ../index.php?success=' .$success);

	echo $_SESSION['username'];
?>