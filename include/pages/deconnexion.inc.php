<?php 
	session_destroy();
	$_SESSION['id']="";
	$_SESSION['pseudo']="";
	header('Location: index.php');
?>