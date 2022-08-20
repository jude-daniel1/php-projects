<?php 
	include 'core/init.php';

	$email = $getFromU->cleanInput($_POST['email']);
	$start = $getFromU->cleanInput($_POST['start']);
	$callerno = $getFromU->cleanInput($_POST['callerno']);
	$calledno = $getFromU->cleanInput($_POST['calledno']);
	$duration = $getFromU->cleanInput($_POST['duration']);
	$base_id = $getFromU->cleanInput($_POST['random']);
	$cdate = date("d/m/Y");
	$stm= $pdo->prepare("INSERT INTO calls(call_start_time,duration,date_of_call,call_destination, phone_no, email, base_id) VALUES(:start,:duration,:cdate,:calledno,:callerno,:email, :base_id)");
	$stm->bindParam(":start", $start, PDO::PARAM_STR);
	$stm->bindParam(":duration", $duration, PDO::PARAM_STR);
	$stm->bindParam(":cdate", $cdate, PDO::PARAM_STR);
	$stm->bindParam(":calledno", $calledno, PDO::PARAM_STR);
	$stm->bindParam(":callerno", $callerno, PDO::PARAM_STR);
	$stm->bindParam(":email", $email, PDO::PARAM_STR);
	$stm->bindParam(":base_id", $base_id, PDO::PARAM_STR);
	$stm->execute();
	$id = $pdo->lastInsertId();
	if ($id != 0 ) {
		echo "called ended successfully";
	}else{
		echo "failed";
	}

 ?>