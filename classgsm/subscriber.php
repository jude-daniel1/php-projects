<?php include 'core/init.php'; ?>
<?php 
	if (isset($_POST['call']) && !empty($_POST['call'])) {
		$callerno = $_POST['callerno'];
		$calledno = $_POST['calledno'];
		if (!empty($callerno) or !empty($calledno)) {
			$callerno = $getFromU->cleanInput($callerno);
			$calledno = $getFromU->cleanInput($calledno);
			$_SESSION['callerno'] = $callerno;
			$_SESSION['calledno'] = $calledno;
			$stm = $pdo->prepare("SELECT base_id FROM base_station");
			$stm->execute();
			$count = $stm->rowCount();
			if ($count > 0) {
				$_SESSION['random'] = rand(1, $count);
			}else{
				$_SESSION['random'] = 0;
			}
			header("Location:begincall.php");
		}else{
				$error = "Please Enter Your username or Password";
			}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.runner.js"></script>
	</head>
<body>
		<div class="col-md-8" style="height:800px; background-color: #222">
				<h2 style="color:white; font-weight: bold; font-family: monospace; margin-top: 200px; font-size: 35px;margin-left: 50px;">CALL CONGESTION MONITORING SYSTEM</h2>
		</div>
		<div class="col-md-4" style="margin-top:140px;">
			<form action="subscriber.php" method="POST">

						<div class="form-group" style="padding: 0px 10px;">
							<h3 style="color:#222">Simulate Call</h3>
						</div>

						<div class="form-group" style="padding: 0px 10px;">

							<select name="callerno" id="phone" class="form-control">
								<option value="num1" style="color:#222">Which of your contact will you use</option>
								<?php 
								$sub_email = $_SESSION['sub_email'];
								$stm = $pdo->prepare("SELECT phone_no FROM network_line WHERE sub_email = :sub_email");
								$stm->bindParam(":sub_email", $sub_email ,PDO::PARAM_STR);
								$stm->execute();
								if ($stm->rowCount() > 0) {
									while($rows = $stm->fetchObject()):?>
										<option value = "<?php echo $rows->phone_no ?>"><?php echo $rows->phone_no ?></option>";
									<?php endwhile; ?>

								<?php
								}
							 ?>
								
							</select>
						</div>


						<div class="form-group" style="padding: 0px 10px;">
							<input type="text" class="form-control" name="calledno" placeholder="Enter The Number">
						</div>


						<div class="form-group" style="padding: 0px 10px;" >
							<button type="submit" name="call" class="btn btn-danger" value = "mycall" >Start</i></button>
						</div>

				</form>	
			</div>	
	</body>
</html>