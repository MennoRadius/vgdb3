<?php 
session_start();
require "../includes/connect.php";

	// logout controller, logs out but wrong msg is shown
	// if($_SESSION){
	// 	session_start();
	// 	session_unset();
	// 	session_destroy();
	// 	$success = urlencode("You are now logged out");
	// 	header('location: ../admin.php?success=' .$success);
	// }

	$errorMsg = "Username and/or password wrong";
	if(!isset($_POST['admin-login'])){
		header("location: ../index.php?warning=".urlencode($errorMsg));
	}else if(empty($_POST['admin-username']) || empty($_POST['admin-password'])){
		header("location: ../admin.php?warning=".urlencode($errorMsg));
	}

	$adminUsernameCheck = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
	$adminUsernameCheck->bindParam('username',$_POST['admin-username'], PDO::PARAM_STR);
	$adminUsernameCheck->execute();
	$adminUsernameCheckResult = $adminUsernameCheck->fetchColumn();

	if(!$adminUsernameCheckResult == 1){
		header("location: ../admin.php?warning=".urlencode($errorMsg));
	}else{
		$adminPasswordCheck = $db->prepare("SELECT COUNT(*) FROM users WHERE password = :password");
		$adminPasswordCheck->bindParam('password',$_POST['admin-password'], PDO::PARAM_STR);
		$adminPasswordCheck->execute();
		$adminPasswordCheckResult = $adminPasswordCheck->fetchColumn();
	}

	if($adminPasswordCheckResult == 1){
		session_start();
		$_SESSION['username'] = $_POST['admin-username'];
		header("location: ../index.php?success=You are now logged in!");
	}else{
		header("location: ../admin.php?warning=".urlencode($errorMsg));
	}

	echo $adminUsernameCheckResult;
	echo $adminPasswordCheckResult;
 ?>