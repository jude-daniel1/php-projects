<?php 
	include '../core/init.php';
	$getFromU->logout();
	if ($getFromU->loginIn() === false) {
		header("Location: ../index.php");
	}

 ?>